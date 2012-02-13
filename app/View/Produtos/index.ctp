<nav id="secondary">
    <ul>
        <li class="current"><a href="#">Main tab</a></li>
        <li><a href="#">Optional second tab</a></li>
        <li><a href="#">Optional third tab</a></li>
    </ul>
</nav>

<section id="content">
    <h2>Lista de produtos</h2>
    <div class="collum left">
        <table class="datatable">
            <thead>
                <tr>
                    <th title="Código">#</th>
                    <th>Nome</th>
                    <th>Valor</th>
                    <th>Quantidade</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($produtos as $produto) : ?>
                    <tr>
                        <td><?php echo $produto['Produto']['id']; ?></td>
                        <td><?php echo $produto['Produto']['nome']; ?></td>
                        <td><?php echo $this->Number->format($produto['Produto']['valor'], array('before' => 'R$ ', 'decimals' => ',', 'thousands' => '.')) ?></td>
                        <td><?php echo $produto['Produto']['quantidade']; ?></td>
                        <td>
                            <span class="button-group">
                                <?php echo $this->Html->link('Ver detalhes', array('controller' => 'produtos', 'action' => 'view', $produto['Produto']['id']), array('class' => 'button icon user')) ?>
				<?php echo $this->Html->link('Editar', array('controller' => 'produtos', 'action' => 'edit', $produto['Produto']['id']), array('class' => 'button icon edit')) ?>
                                <?php echo $this->Html->link('Remover', array('controller' => 'produtos', 'action' => 'delete', $produto['Produto']['id']), array('class' => 'button icon remove danger'), "Tem certeza que deseja deletar esse produto?") ?>
                            </span>
                        </td>
                    </tr>        
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>