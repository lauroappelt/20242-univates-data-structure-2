<?php

class BlockChain
{
    public function __construct(
        public array $chain = [],
        public int $difficulty = 4
    ) {
        $this->chain = [$this->creteGenesisBlock()];
        $this->difficulty = 4;
    }

    private function creteGenesisBlock()
    {
        return new Block(
            0,
            date('Y-m-d H:i:s'),
            ['data' => 'Genesis'],
            "0"
        );
    }

    public function getLastBlock()
    {
        return $this->chain[count($this->chain) - 1];
    }

    public function addBlock($newBlock)
    {
        $newBlock->previousHash = $this->getLastBlock()->hash;
        $newBlock->mine($this->difficulty);
        $this->chain[] = $newBlock;
    }


    public function isChainValid()
    {
        for ($i = 1; $i < count($this->chain); $i++) {
            $currentBlock = $this->chain[$i];
            $previousBlock = $this->chain[$i - 1];

            if ($currentBlock->hash !== $currentBlock->hash()) {
                return false;
            }

            if ($currentBlock->previousHash !== $previousBlock->hash) {
                return false;
            }
        }

        return true;
    }
    
}
