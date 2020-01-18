<?php 

namespace App\Libraries;

use Illuminate\Support\Facades\Storage;

class Prince
{
    private $prince;
    private $storage;
    private $options;
    function __construct($title)
    {
        $this->prince = env('PRINCE_SOURCE');
        $this->storage = Storage::disk('public_uploads')->getDriver()->getAdapter()->getPathPrefix(); // env('PRINCE_STORAGE')
        $this->options = '--input=html --pdf-author="Yoel Diomedez" --pdf-title="' . $title . '"';
    }
    public function generate($html)
    {
        $filename = $this->storage . time() . '_' . bin2hex(random_bytes(20)); 
    	file_put_contents($filename, $html);
        
        exec(sprintf('%1$s %2$s %3$s --output %3$s.pdf', $this->prince, $this->options, $filename));
        if(file_exists($filename . '.pdf'))
        {
            header("Content-type:application/pdf");
            header("Content-Disposition:inline;filename=reporte.pdf");
            header('Content-Length: ' . filesize($filename . '.pdf'));
            readfile($filename . '.pdf');    
        }
    }
}