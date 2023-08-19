<?php

namespace App\Controllers;

use App\Models\Modelakun;
use App\Models\Modelkeahlian;
use App\Models\Modellamaran;
use App\Models\Modellowongan;
use App\Models\Modelsyarat;
use App\Models\Modelpelamar;
use App\Models\Modelskil;
use App\Models\Modelriwayat;




use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = ['form', 'url'];

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
        $this->session = \Config\Services::session();
        $this->Akun = new Modelakun();
        $this->Keahlian = new Modelkeahlian();
        $this->Lowongan = new Modellowongan();
        $this->Syarat = new Modelsyarat();
        $this->Pelamar = new Modelpelamar();
        $this->Skil = new Modelskil();
        $this->Lamar = new Modellamaran();
        $this->Riwayat = new Modelriwayat();
    }
}
