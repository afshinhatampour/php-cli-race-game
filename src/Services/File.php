<?php

namespace Afshin\Racecli\Services;

class File
{
    /**
     * @var string
     */
    private string $fileContent = '';

    /**
     * @var mixed
     */
    private mixed $result;

    /**
     * @param string $fileName
     * @return $this
     */
    public function getFileContent(string $fileName): File
    {
        $this->fileContent = file_get_contents($fileName);
        return $this;
    }

    /**
     * @return $this
     */
    public function asJson(): File
    {
        $this->result = json_decode($this->fileContent);
        return $this;
    }

    /**
     * @return mixed
     */
    public function getResult(): mixed
    {
        return $this->result;
    }
}