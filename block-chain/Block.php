<?php

class Block
{
    public function __construct(
        public int $index,
        public string $timestamp,
        public array $data,
        public string $previousHash,
        public int $nonce = 0,
        public ?string $hash = null
    ) {
        if (empty($hash)) {
            $this->hash = $this->hash();
        }
    }

    public function hash()
    {
        return hash(
            'sha256',
            (string) $this->index
            . $this->timestamp
            . json_encode($this->data)
            . $this->previousHash
            . (string) $this->nonce
        );
    }

    public function mine($difficulty)
    {
        $target = str_repeat('0', $difficulty);
        while (substr($this->hash, 0, $difficulty) !== $target) {
            $this->nonce++;
            $this->hash = $this->hash();
        }

        echo "Block mined: " . $this->hash . PHP_EOL;
    }

    public function __toString() {
        return "{index: {$this->index} | nonce: {$this->nonce} | data: " . json_encode($this->data) . 
               " | timestamp: {$this->timestamp} | prev hash: {$this->previousHash} | hash: {$this->hash}}";
    }
}
