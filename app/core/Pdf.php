<?php
// defined('BASEPATH') OR exit('No direct script access allowed');
// error_reporting(0);

class Pdf
{


	public function create($content, $file_name)
	{
		// $ci = &get_instance();
		// $ci->load->helper('tcpdf');
		spl_autoload_register(function ($class) {
			require_once 'tcpdf/' . $class . '.php';
		});

		$pdf = init_pdf();

		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Novi Indriani');
		$pdf->SetTitle('Dokumen Rincian Gaji Guru');
		$pdf->SetSubject('Dokumen Rincian Gaji Guru');
		$pdf->SetKeywords('');

		// header
		$pdf->SetHeaderMargin(10);

		// footer
		$pdf->setPrintFooter(FALSE);

		// margin
		$pdf->SetMargins(15, 30, 15, 15);
		$pdf->SetAutoPageBreak(TRUE, 25);

		// font
		$pdf->SetFont('tahoma', '', 10);

		// output
		$pdf->AddPage();
		$pdf->writeHTML($content, TRUE, FALSE, TRUE, FALSE, '');
		$pdf->lastPage();
		$pdf->Output($file_name . '.pdf', 'I');
	}
}
// END MY_Pdf class

/* End of file Pdf.php */
/* Location: ./application/libraries/Pdf.php */