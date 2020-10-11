<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class ParserRunCommand extends Command
{
    protected static $defaultName = 'parser:run';

    /**
     * @var SymfonyStyle
     */
    private $io;

    /**
     * ParserRunCommand constructor.
     */
    public function __construct() {
        parent::__construct();
    }


    protected function configure()
    {
        $this
            ->setDescription('Add a short description for your command')
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->io = new SymfonyStyle($input, $output);
        $arg1 = $input->getArgument('arg1');

        if($arg1) {
            $this->io->note(sprintf('You passed an argument: %s', $arg1));
        }

        if($input->getOption('option1')) {
            // ...
        }
        $this->getPage();

        $this->io->success('You have a new command! Now make it your own! Pass --help to see your options.');

        return 0;
    }

    public function getPage()
    {
        $page = file_get_contents('https://yandex.by/news/');
        $phpQueryObject = \phpQuery::newDocument($page);
        $links = $phpQueryObject->find('.news-card__link');

        foreach($links as $link) {
            $pqLink = pq($link);

            $html[] = $pqLink->attr('href');
        }
        $this->io->text($html);
    }

}
