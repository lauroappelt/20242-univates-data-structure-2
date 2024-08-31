<?php

require 'BlockChain.php';
require 'Block.php';

$myBlockchain = new BlockChain();

echo "Mining block 1...\n";
$myBlockchain->addBlock(new Block(1, date('Y-m-d H:i:s'), ['amount' => 4], $myBlockchain->getLastBlock()->hash));

echo "Mining block 2...\n";
$myBlockchain->addBlock(new Block(2, date('Y-m-d H:i:s'), ['amount' => 10], $myBlockchain->getLastBlock()->hash));

echo "Blockchain valid? " . ($myBlockchain->isChainValid() ? "Yes" : "No") . "\n";

// Imprime toda a cadeia de blocos
foreach ($myBlockchain->chain as $block) {
    echo $block . "\n";
}
?>