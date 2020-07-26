<?php
class Filter
{
    protected $connection;

    protected $conetnt;


    public function __construct(PDO $connection) {
        $this->connection = $connection;
    }


    //filter for output
    public function filterOutput($content) {
        $content = htmlentities($content, ENT_NOQUOTES);
        $conetnt = nl2br($content, false);
        return $content;
    }
}