<nav id="secondary">
    <ul>
        <li class="current"><a href="#">Main tab</a></li>
        <li><a href="#">Optional second tab</a></li>
        <li><a href="#">Optional third tab</a></li>
    </ul>
</nav>

<section id="content">
    <h2>Vendas já registradas</h2>
    <div class="collum left">
        <table class="datatable">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Data / Hora</th>
                    <th>Produtos</th>
                    <th>Vendedor</th>
                    <th>Forma de pagamento</th>
                    <th>Desconto total</th>
                    <th>Valor Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($vendas as $venda) : ?>
                    <tr>
                        <td><?php echo $venda['Venda']['id']; ?></td>
                        <td><?php echo $this->Time->format('d/m/Y H:i:s', $venda['Venda']['created']); ?></td>
                        <td><a href="#" class="button icon tag">Ver Produtos</a></td>
                        <td><?php echo $venda['Vendedor']['nome'].' '.$venda['Vendedor']['sobrenome']; ?></td>
                        <td><?php echo $venda['Venda']['forma_pagamento']; ?></td>
                        <td><?php //echo $venda['Venda']['celular']; ?></td>
                        <td><?php echo $venda['Venda']['valor_total']; ?></td>
                    </tr>        
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>
