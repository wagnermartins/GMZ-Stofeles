<section id="content">
    <h2>Vendas já registradas </h2>
    
    <p><?php echo $this->Html->link('Nova venda', array('controller' => 'vendas', 'action' => 'add'), array('class' => 'button icon add')) ?></p>
    <div class="collum left">
        <table class="datatable">
            <thead>
                <tr>
                    <th title="Código">#</th>
                    <th>Data / Hora</th>
                    <th>Produtos</th>
                    <th>Vendedor</th>
                    <th>Forma de pagamento</th>
                    <th>Subtotal</th>
                    <th>Total</th>
                    <th>Desconto</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($vendas as $venda) : ?>
                    <tr>
                        <td><?php echo $venda['Venda']['id']; ?></td>
                        <td><?php echo $this->Time->format('d/m/Y H:i:s', $venda['Venda']['created']); ?></td>
                        <td><?php echo $this->Html->link("Ver Produtos", array("controller" => "vendas", "action" => "view", $venda['Venda']['id']), array("class" => "button icon tag")); ?></td>
                        <td><?php echo $venda['Vendedor']['nome'].' '.$venda['Vendedor']['sobrenome']; ?></td>
                        <td><?php echo $venda['Venda']['forma_pagamento']; ?></td>
                        <td><?php echo $this->Number->format($venda['Venda']['valor_subtotal'], array('before' => 'R$ ', 'decimals' => ',', 'thousands' => '.')) ?></td>
                        <td><?php echo $this->Number->format($venda['Venda']['valor_total'], array('before' => 'R$ ', 'decimals' => ',', 'thousands' => '.')) ?></td>
                        <td><?php echo $venda['Venda']['desconto']."%"; ?></td>
                        <td><?php echo $this->Html->link("", array("controller" => "vendas", "action" => "delete", $venda['Venda']['id']), array("style" => "width:6px;", "class" => "button icon remove danger"), "Deseja cancelar essa venda? Os produtos serão repostos no estoque") ?></td>
                    </tr>        
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>
