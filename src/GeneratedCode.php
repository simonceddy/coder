<?php
namespace Eddy\Coder;

/**
 * Simple object containing the filepath and contents of a newly created
 * bit of code.
 */
class GeneratedCode
{
    public function __construct(
        private string $filePath,
        private string $contents
    ) {}

    /**
     * Get the full filepath
     *
     * @return string
     */
    public function getPath()
    {
        return $this->filePath;
    }

    /**
     * Get the generated contents
     *
     * @return string
     */
    public function getContents()
    {
        return $this->contents;
    }

    /**
     * Returns the code contents as a string
     *
     * @return string
     */
    public function __toString()
    {
        return $this->getContents();
    }
}
