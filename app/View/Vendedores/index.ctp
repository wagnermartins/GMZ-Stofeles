<?php echo $this->Html->script(array('jquery.maskedinput-1.3.min')); ?>
<section id="content">
    <h2>Lista de vendedores</h2>
    
    <?php if ($current_user['role'] == 'admin'): ?>       
        <p><?php echo $this->Html->link('Novo vendedor', array('controller' => 'vendedores', 'action' => 'add'), array('class' => 'button icon add')) ?></p>
    <?php endif; ?>
    <div class="collum left">
        <table class="datatable">
            <thead>
                <tr>
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
                        <td><?php echo $vendedor['Vendedor']['nome'].' '.$vendedor['Vendedor']['sobrenome'] ?></td>
                        <td><?php echo $vendedor['Vendedor']['username']; ?></td>
                        <td><span class="telefone"><?php echo $vendedor['Vendedor']['telefone']; ?></span></td>
                        <td><?php echo $vendedor['Vendedor']['celular']; ?></td>
                        <td>
                            <span class="button-group">
                                <?php echo $this->Html->link('Ver detalhes', array('controller' => 'vendedores', 'action' => 'view', $vendedor['Vendedor']['id']), array('class' => 'button icon user')) ?>
                                <?php if ($current_user['role'] == 'admin'): ?>       
                                    <?php echo $this->Html->link('Editar', array('controller' => 'vendedores', 'action' => 'edit', $vendedor['Vendedor']['id']), array('class' => 'button icon edit')) ?>
                                    <?php echo $this->Html->link('Remover', array('controller' => 'vendedores', 'action' => 'delete', $vendedor['Vendedor']['id']), array('class' => 'button icon remove danger'), "Tem certeza que deseja deletar esse vendedor?") ?>
                                <?php endif; ?>
                            </span>
                        </td>
                    </tr>        
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>