<nav id="secondary">
    <ul>
        <li class="current"><a href="#">Main tab</a></li>
        <li><a href="#">Optional second tab</a></li>
        <li><a href="#">Optional third tab</a></li>
    </ul>
</nav>

<section id="content">
    <h2>Lista de vendedores</h2>
    <table class="datatable">
        <thead>
            <tr>
                <th><?php echo $this->Paginator->sort('id', 'ID'); ?></th>
                <th><?php echo $this->Paginator->sort('nome', 'Nome'); ?></th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($vendedores as $vendedor) : ?>
                <tr>
                    <td><?php echo $vendedor['Vendedor']['id']; ?></td>
                    <td><?php echo $vendedor['Vendedor']['nome'].' '.$vendedor['Vendedor']['sobrenome'] ?></td>
                    <td>
                        <span class="button-group">
                            <a href="#" class="button icon edit">Editar</a>
                            <a href="#" class="button icon remove danger">Remover</a>
                        </span>
                    </td>
                </tr>        
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php echo $this->Paginator->prev('Anterior').' '.$this->Paginator->numbers().' '.$this->Paginator->next('Próximo'); ?>
</section>