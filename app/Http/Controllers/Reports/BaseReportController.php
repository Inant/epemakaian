<?php

namespace App\Http\Controllers\Reports;

use Barryvdh\DomPDF\Facade as PDF;
use App\Http\Controllers\Controller;

abstract class BaseReportController extends Controller{

    /**
     * DomPDF 
     *
     * @var Object
     */
    private $pdf;
    
    /**
     * Set page orientation
     *
     * @var string
     */
    protected $orientation;

    public function __construct()
    {
        $this->pdf = app(PDF::class);
        $this->orientation = 'potrait';
    }

    abstract function setData($request);

    protected function printPdf($request)
    {
        return $this->pdf::loadview('layouts.report.' . $this->layout, $this->setData($request))
            ->setPaper('a4', $this->orientation)
            ->stream($this->title . '.pdf', ['Attachment' => false]);
    }

    protected function printHtml($request)
    {
        return view('layouts.report.' . $this->layout, $this->setData($request));
    }
}