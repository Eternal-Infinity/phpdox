<?php
// @codingStandardsIgnoreFile
// @codeCoverageIgnoreStart 
// this is an autogenerated file - do not edit
spl_autoload_register(
    function($class) {
        static $classes = null;
        if ($classes === null) {
            $classes = array(
                'carica\\xsl\\runner\\callback' => '/generator/engine/XSLRunner/Callback.php',
                'carica\\xsl\\runner\\callback\\console' => '/generator/engine/XSLRunner/Callback/Console.php',
                'carica\\xsl\\runner\\callback\\loaddocument' => '/generator/engine/XSLRunner/Callback/LoadDocument.php',
                'carica\\xsl\\runner\\callback\\typestring' => '/generator/engine/XSLRunner/Callback/TypeString.php',
                'carica\\xsl\\runner\\directory' => '/generator/engine/XSLRunner/Directory.php',
                'carica\\xsl\\runner\\streamwrapper\\pathmapper' => '/generator/engine/XSLRunner/Streamwrapper/PathMapper.php',
                'theseer\\phpdox\\analyser' => '/collector/Analyser.php',
                'theseer\\phpdox\\application' => '/Application.php',
                'theseer\\phpdox\\applicationexception' => '/Application.php',
                'theseer\\phpdox\\bootstrap' => '/bootstrap/Bootstrap.php',
                'theseer\\phpdox\\bootstrapapi' => '/bootstrap/BootstrapApi.php',
                'theseer\\phpdox\\bootstrapexception' => '/bootstrap/Bootstrap.php',
                'theseer\\phpdox\\buildconfig' => '/config/BuildConfig.php',
                'theseer\\phpdox\\classbuilder' => '/collector/ClassBuilder.php',
                'theseer\\phpdox\\cli' => '/CLI.php',
                'theseer\\phpdox\\collector' => '/collector/Collector.php',
                'theseer\\phpdox\\collectorconfig' => '/config/CollectorConfig.php',
                'theseer\\phpdox\\configexception' => '/config/GlobalConfig.php',
                'theseer\\phpdox\\configloader' => '/config/ConfigLoader.php',
                'theseer\\phpdox\\configloaderexception' => '/config/ConfigLoader.php',
                'theseer\\phpdox\\container' => '/shared/Container.php',
                'theseer\\phpdox\\docblock\\descriptionparser' => '/docblock/parser/DescriptionParser.php',
                'theseer\\phpdox\\docblock\\docblock' => '/docblock/DocBlock.php',
                'theseer\\phpdox\\docblock\\docblockexception' => '/docblock/DocBlock.php',
                'theseer\\phpdox\\docblock\\factory' => '/docblock/Factory.php',
                'theseer\\phpdox\\docblock\\factoryexception' => '/docblock/Factory.php',
                'theseer\\phpdox\\docblock\\genericelement' => '/docblock/GenericElement.php',
                'theseer\\phpdox\\docblock\\genericelementexception' => '/docblock/GenericElement.php',
                'theseer\\phpdox\\docblock\\genericparser' => '/docblock/parser/GenericParser.php',
                'theseer\\phpdox\\docblock\\inlineprocessor' => '/docblock/InlineProcessor.php',
                'theseer\\phpdox\\docblock\\internalparser' => '/docblock/parser/InternalParser.php',
                'theseer\\phpdox\\docblock\\invalidelement' => '/docblock/InvalidElement.php',
                'theseer\\phpdox\\docblock\\invalidparser' => '/docblock/parser/InvalidParser.php',
                'theseer\\phpdox\\docblock\\licenseparser' => '/docblock/parser/LicenseParser.php',
                'theseer\\phpdox\\docblock\\paramparser' => '/docblock/parser/ParamParser.php',
                'theseer\\phpdox\\docblock\\parser' => '/docblock/Parser.php',
                'theseer\\phpdox\\docblock\\varparser' => '/docblock/parser/VarParser.php',
                'theseer\\phpdox\\engine\\abstractengine' => '/generator/engine/AbstractEngine.php',
                'theseer\\phpdox\\engine\\engineinterface' => '/generator/engine/EngineInterface.php',
                'theseer\\phpdox\\engine\\eventbuilderexception' => '/generator/engine/AbstractEngine.php',
                'theseer\\phpdox\\engine\\factory' => '/generator/engine/Factory.php',
                'theseer\\phpdox\\engine\\factoryexception' => '/generator/engine/Factory.php',
                'theseer\\phpdox\\engine\\graph' => '/generator/engine/graph/Graph.php',
                'theseer\\phpdox\\engine\\html' => '/generator/engine/html/Html.php',
                'theseer\\phpdox\\engine\\html\\functions' => '/generator/engine/html/functions.php',
                'theseer\\phpdox\\engine\\htmlconfig' => '/generator/engine/html/Html.php',
                'theseer\\phpdox\\engine\\todo' => '/generator/engine/todo/Todo.php',
                'theseer\\phpdox\\engine\\xslrunner' => '/generator/engine/XSLRunner/XSLRunner.php',
                'theseer\\phpdox\\engine\\xslrunnerconfig' => '/generator/engine/XSLRunner/XSLRunner.php',
                'theseer\\phpdox\\enginebootstrapapi' => '/bootstrap/EngineBootstrapApi.php',
                'theseer\\phpdox\\errorhandler' => '/shared/ErrorHandler.php',
                'theseer\\phpdox\\event' => '/generator/Event.php',
                'theseer\\phpdox\\eventexception' => '/generator/Event.php',
                'theseer\\phpdox\\eventfactory' => '/generator/EventFactory.php',
                'theseer\\phpdox\\eventfactoryexception' => '/generator/EventFactory.php',
                'theseer\\phpdox\\factory' => '/shared/Factory.php',
                'theseer\\phpdox\\factoryexception' => '/shared/Factory.php',
                'theseer\\phpdox\\factoryinterface' => '/shared/FactoryInterface.php',
                'theseer\\phpdox\\generator' => '/generator/Generator.php',
                'theseer\\phpdox\\generatorconfig' => '/config/GeneratorConfig.php',
                'theseer\\phpdox\\generatorconfigexception' => '/config/GeneratorConfig.php',
                'theseer\\phpdox\\generatorexception' => '/generator/Generator.php',
                'theseer\\phpdox\\globalconfig' => '/config/GlobalConfig.php',
                'theseer\\phpdox\\parserbootstrapapi' => '/bootstrap/ParserBootstrapApi.php',
                'theseer\\phpdox\\progresslogger' => '/logger/ProgressLogger.php',
                'theseer\\phpdox\\progressloggerexception' => '/logger/ProgressLogger.php',
                'theseer\\phpdox\\projectconfig' => '/config/ProjectConfig.php',
                'theseer\\phpdox\\service' => '/generator/Service.php',
                'theseer\\phpdox\\shellprogresslogger' => '/logger/ShellProgressLogger.php'
            );
        }
        $cn = strtolower($class);
        if (isset($classes[$cn])) {
            require __DIR__ . $classes[$cn];
        }
    }
);
// @codeCoverageIgnoreEnd