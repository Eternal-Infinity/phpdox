<?php
/**
 * Copyright (c) 2010-2011 Arne Blankerts <arne@blankerts.de>
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without modification,
 * are permitted provided that the following conditions are met:
 *
 *   * Redistributions of source code must retain the above copyright notice,
 *     this list of conditions and the following disclaimer.
 *
 *   * Redistributions in binary form must reproduce the above copyright notice,
 *     this list of conditions and the following disclaimer in the documentation
 *     and/or other materials provided with the distribution.
 *
 *   * Neither the name of Arne Blankerts nor the names of contributors
 *     may be used to endorse or promote products derived from this software
 *     without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT  * NOT LIMITED TO,
 * THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR
 * PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER ORCONTRIBUTORS
 * BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY,
 * OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
 * SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
 * CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @package    phpDox
 * @author     Arne Blankerts <arne@blankerts.de>
 * @copyright  Arne Blankerts <arne@blankerts.de>, All rights reserved.
 * @license    BSD License
 */
namespace TheSeer\phpDox {

    use \TheSeer\DirectoryScanner\PHPFilterIterator;
    use \TheSeer\fDOM\fDOMDocument;
    use \TheSeer\fDOM\fDOMException;

    class Collector {

        /**
         * Starting index position in src path string to use in store
         * @var int
         */
        protected $srcIndex = 0;

        /**
         * Logger for progress and error reporting
         *
         * @var Logger
         */
        protected $logger;

        public function __construct(ProgressLogger $logger) {
            $this->logger = $logger;
        }

        /**
         * Setter to overwrite the default source directory string index position
         *
         * @param string $dir Directory to change source directory to
         */
        public function setStartIndex($index) {
            $this->srcIndex = $index;
        }

        /**
         * Main executer of the collector, looping over the iterator with found files
         *
         */
        public function run(\Iterator $scanner, Container $container, Analyser $analyser, $xmlDir) {
            $worker = new PHPFilterIterator($scanner);

            if (!file_exists($xmlDir)) {
                mkdir($xmlDir, 0755, true);
            }

            foreach($worker as $file) {
                $target = $this->setupTarget($file, $xmlDir);
                if (file_exists($target) && filemtime($target)==$file->getMTime()) {
                    $this->logger->progress('cached');
                    continue;
                }
                try {
                    $xml = $analyser->processFile($file);
                    $xml->formatOutput= true;

                    // This is a workaround:
                    // Try to reparse generated xml to catch invalid utf-8 byte ranges
                    $tmp = new fDOMDocument();
                    $tmp->loadXML($xml->saveXML());

                    $xml->save($target);
                    touch($target, $file->getMTime(), $file->getATime());

                    $src = realpath($file->getPathName());

                    $container->registerNamespaces($analyser->getNamespaces(), $src, $target);
                    $container->registerInterfaces($analyser->getInterfaces(), $src, $target);
                    $container->registerClasses($analyser->getClasses(), $src, $target);

                    $this->logger->progress('processed');

                } catch (fDOMException $e) {
                    $this->logger->progress('failed');
                } catch (\pdepend\reflection\exceptions\ParserException $e) {
                    // TODO: Add failed file to error list?
                    $this->logger->progress('failed');
                } catch (\Exception $e) {
                    $this->logger->progress('failed');
                    throw $e;
                }
            }
            $this->logger->completed();

        }

        protected function setupTarget($file, $xmlDir) {
            $path = substr($file->getPathName(), $this->srcIndex);
            $target = $xmlDir . $path . '.xml';
            $targetDir = dirname($target);
            if (!file_exists($targetDir)) {
                mkdir($targetDir, 0755, true);
            }
            return $target;
        }
    }

}