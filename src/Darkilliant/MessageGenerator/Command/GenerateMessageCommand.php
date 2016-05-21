<?php 
namespace Darkilliant\MessageGenerator\Command;

use Darkilliant\MessageGenerator\Generator\LogoGenerator;
use Darkilliant\MessageGenerator\Manager\MessageManager;
use Darkilliant\MessageGenerator\Generator\MessageGenerator;
use Darkilliant\MessageGenerator\Question\QuestionProcessor;
use Darkilliant\MessageGenerator\Loader\MessageLoader;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Input\InputOption;

class GenerateMessageCommand extends Command {
    public function configure()
    {
        $this
            ->setName('message:generate')
            ->addArgument('source')
            ->addOption(
                'output',
                null,
                InputOption::VALUE_REQUIRED,
                'If set, the task will yell in uppercase letters'
            )
        ;
    }
    
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // On affiche le logo
        LogoGenerator::generate($output);
        
        $source = $input->getArgument('source');
        
        $outputMessage = $input->getOption('output');
        
        $symfonyStyle = new SymfonyStyle($input, $output);
        
        $symfonyStyle->writeln('source : ' . $source);
        
        $messageManager = new MessageManager(new MessageGenerator(), new QuestionProcessor(), new MessageLoader(__DIR__ . '/../Resources/config/messages'));
    
        file_put_contents($outputMessage, $messageManager->generate($source));
        
        $output->writeln('message généré');
    }
}