<h1>Listagem de produtos</h1>

<table>
    <tr>
        <td><?php echo $this->Paginator->sort('id', 'ID'); ?></td>
        <td><?php echo $this->Paginator->sort('nome', 'Nome'); ?></td>
        <td>Descrição</td>
        <td><?php echo $this->Paginator->sort('valor', 'Valor'); ?></td>
    </tr>
    
    <?php foreach($produtos as $produto) : ?>
        <tr>
            <td><?php echo $produto['Produto']['id']; ?></td>
            <td><?php echo $produto['Produto']['nome']; ?></td>
            <td><?php echo $produto['Produto']['descricao']; ?></td>
            <td><?php echo $produto['Produto']['valor']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>
<?php echo $this->Paginator->prev('Anterior').' '.$this->Paginator->numbers().' '.$this->Paginator->next('Próximo'); ?>