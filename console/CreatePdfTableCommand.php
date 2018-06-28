<?php


namespace Console;


use Calligraphy\CreateHtmlDataArray;
use Calligraphy\CreateHtmlDoc;
use Calligraphy\HtmlTable;
use Dompdf\Dompdf;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreatePdfTableCommand extends Command
{
    /**
     * @var CreateHtmlDoc
     */
    private $createHtmlDoc;
    /**
     * @var CreateHtmlDataArray
     */
    private $createData;
    /**
     * @var HtmlTable
     */
    private $htmlTable;
    /**
     * @var mixed
     */
    private $dataSet;

    /**
     * CreatePdfTableCommand constructor.
     * @param CreateHtmlDoc $createHtmlDoc
     * @param CreateHtmlDataArray $createData
     * @param HtmlTable $htmlTable
     */
    public function __construct(CreateHtmlDoc $createHtmlDoc, CreateHtmlDataArray $createData, HtmlTable $htmlTable)
    {
        parent::__construct();

        $this->createHtmlDoc = $createHtmlDoc;
        $this->createData = $createData;
        $this->htmlTable = $htmlTable;
        $this->dataSet = include dirname( __FILE__ ).'/../src/datasets/es.php';
    }

    protected function configure()
    {
        $this
            ->setName('calligraphy:create-pdf')

            // the short description shown while running "php bin/console list"
            ->setDescription('Creates a pdf')

            // the full command description shown when running the command with
            // the "--help" option
            ->setHelp('This command creates a pdf with characters');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Creating a table!');

        $array = $this->createData->parse(utf8_encode($this->dataSet[0]['alphabet']), 5);
        $table = $this->htmlTable->create($array)->getTable();
        $data = ['table' => $table];
        $html = $this->createHtmlDoc->createDoc($data);



        $dompdf = new Dompdf();
        $dompdf->setBasePath(__DIR__.'/../assets/');
        $dompdf->loadHtml($html);
        $dompdf->render();

        $pdf_gen = $dompdf->output();

        $path = dirname( __FILE__ ).'/../tmp/test.pdf';

        if(!file_put_contents($path, $pdf_gen)){
            $output->write('Not Ok!');
        }else {
            $output->write('Ok!');
        }


    }
}