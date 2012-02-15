<section id="content">
    <h2>Venda #<?php echo $vendas[0]['ItensVenda']['venda_id']; ?></h2>
    <div class="collum left">
        <table class="datatable">
            <thead>
                <tr>
                    <th>Código do produto</th>
                    <th>Quantidade</th>
                </tr>
            </thead>
            <tbody
                <?php foreach($vendas as $venda) : ?>
                                <tr>
                                    <td><?php echo $this->Html->link("#".$venda['ItensVenda']['produto_id'],array("controller" => "produtos", "action" => 'view/'.$venda['ItensVenda']['produto_id'])); ?></td>
                                    <td><?php echo $venda['ItensVenda']['quantidade']; ?></td>
                                </tr>            
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>
