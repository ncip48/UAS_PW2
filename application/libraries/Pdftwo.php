<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

// use TCPDF;
require_once './vendor/tecnickcom/tcpdf/tcpdf.php';

class Pdftwo extends TCPDF
{
	/**
	 * PDF filename
	 * @var String
	 */
	public $filename;
	public function __construct()
	{
		parent::__construct();
		$this->filename = "rps.pdf";
	}
	/**
	 * Get an instance of CodeIgniter
	 *
	 * @access    protected
	 * @return    void
	 */
	protected function ci()
	{
		return get_instance();
	}
	/**
	 * Load a CodeIgniter view into domPDF
	 *
	 * @access    public
	 * @param    string    $view The view to load
	 * @param    array    $data The view data
	 * @return    void
	 */
	public function load_view($view, $data = array())
	{
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		$html = $this->ci()->load->view($view, $data, TRUE);
		// $this->load_html($html);
		// Render the PDF
		// $this->render();
		// $this->stream($this->filename, array("Attachment" => false));
		$pdf->AddPage();
		$html2 = <<<EOD
		$html
		EOD;
		$pdf->writeHTML($html2, true, false, false, false, '');

		// -----------------------------------------------------------------------------

		//Close and output PDF document
		$pdf->Output($this->filename, 'I');
	}
}
