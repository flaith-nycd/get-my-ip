<?php

namespace App\Http\Controllers;

use App\Http\Requests;


class GetIpController extends Controller
{
    /**
     * Display all the info and the help
     *
     * @return array
     */
    public function index()
    {
        return [
            $this->getAll(),
            $this->getHelp()
        ];
    }

    /**
     * Display all the info
     *
     * @return array
     */
    public function getAll()
    {
        $ip = $this->getIp();
        $browser = $this->getBrowser();

        return [
            'data' => [
                $ip,
                $browser
            ]
        ];
    }

    /**
     * What is my ip address ?
     *
     * @return array
     */
    public function getIp()
    {
        $remote_ip = "IP Undefined";

        if (isset($_SERVER["REMOTE_ADDR"])) {
            $remote_ip = $_SERVER["REMOTE_ADDR"];
        }

        return ['ip' => $remote_ip];
    }

    /**
     * What is your browser's name?
     *
     * @return array
     */
    public function getBrowser()
    {
        $browser = "Unknown browser";

        if (isset($_SERVER['HTTP_USER_AGENT'])) {
            $browser = $_SERVER['HTTP_USER_AGENT'];
        }

        return ['browser' => $browser];

    }

    /**
     * Display the help
     *
     * @return array
     */
    public function getHelp()
    {
        return [
            'help' => [
                "get_ip" => "Get your server IP",
                "get_browser" => "Get your browser informations viewed by the server",
                "get_all" => "Return both infos in json form",
                "get_help" => "Display this help"
            ]
        ];
    }
}
