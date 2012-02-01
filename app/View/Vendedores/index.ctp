<nav id="secondary">
    <ul>
        <li class="current"><a href="#">Main tab</a></li>
        <li><a href="#">Optional second tab</a></li>
        <li><a href="#">Optional third tab</a></li>
    </ul>
</nav>

<section id="content">
    <h2>Lista de vendedores</h2>
    <div class="collum left">
        <table class="datatable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th> <?php // Via CakePHP: echo $this->Paginator->sort('nome', 'Nome'); ?>
                    <th>Username</th>
                    <th>Telefone</th>
                    <th>Celular</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($vendedores as $vendedor) : ?>
                    <tr>
                        <td><?php echo $vendedor['Vendedor']['id']; ?></td>
                        <td><?php echo $vendedor['Vendedor']['nome'].' '.$vendedor['Vendedor']['sobrenome'] ?></td>
                        <td><?php echo $vendedor['Vendedor']['username']; ?></td>
                        <td><?php echo $vendedor['Vendedor']['telefone']; ?></td>
                        <td><?php echo $vendedor['Vendedor']['celular']; ?></td>
                        <td>
                            <span class="button-group">
                                <a href="#" class="button icon user">Ver Detalhes</a>
                                <a href="#" class="button icon edit">Editar</a>
                                <a href="#" class="button icon remove danger">Remover</a>
                            </span>
                        </td>
                    </tr>        
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
        <?php echo $this->Paginator->prev('Anterior').' '.$this->Paginator->numbers().' '.$this->Paginator->next('Próximo'); ?>
</section>