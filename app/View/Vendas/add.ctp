<?php echo $this->Html->script(array('jquery.formatCurrency-1.4.0.min', 'jquery.formatCurrency.pt-BR', 'jquery.formrestrict', 'jquery.alphanumeric', 'jquery.hotkeys', 'cart')); ?>
<nav id="secondary">
    <ul>
        <li class="current"><a href="#">Main tab</a></li>
        <li><a href="#">Optional second tab</a></li>
        <li><a href="#">Optional third tab</a></li>
    </ul>
</nav>

<section id="content">
    <h2>Realizar venda</h2>

    <div class="column left third cart">
    	 <h3>Carrinho</h3>
    	 <p>
    	 <small>Adicione itens ao carrinho a partir da tabela a direita.</small>
    	 </p>
  		<table class="realcart" style="display:none; width:330px; font-size:0.9em;">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Valor</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($produtos as $produto) : ?>
                    <tr id="<?php echo $produto['Produto']['id'];?>" style="display:none";>
	                        <td><?php echo $produto['Produto']['nome']; ?></td>
	                        <td class="valor"><?php echo $this->Number->format($produto['Produto']['valor'], array('before' => 'R$ ', 'decimals' => ',', 'thousands' => '.')) ?></td>
	                        <td class="pid-<?php echo $produto['Produto']['id']; ?>" style="width:70px">
	                            <span class="button-group">
	                                <form style="position: absolute;"><input class="qtdNum qtdField-<?php echo $produto['Produto']['id'];?>" style="width:30px; height:23px;margin: 0px 30px;" type="text" placeholder="Qtd." maxlength="4">
	                                </form>
	                             <?php echo $this->Html->link('', array('controller' => '', 'action' => '', $produto['Produto']['id']), array('style' => 'width:10px; height:13px;', 'alt' => $produto['Produto']['id'], 'class' => 'button icon danger remove removeFromCart')) ?>
	                            </span>
	                        </td>
                    </tr>        
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="cartResume">
        <span class="subtotal"><strong>Subtotal:</strong><span style="padding: 0 5px">R$ 0,00</span></span></br>
        <span class="total"><strong>Total:</strong><span style="padding: 0 5px">R$ 0,00</span></span>
        <form style="position: relative; display: inline;"><input class="desconto" style="width:62px; height:23px;margin: 5px;" type="text" placeholder="Desconto %" maxlength="3">%</form><br/>
        <section>
            <label>
            </label>
          <div class="forma_pagamento">
            <select style="width:150px;">
              <option>Dinheiro</option>
              <option>Cartão de Débito</option>
              <option>Cartão de Crédito</option>
              <option>Cheque</option>
            </select>
             <a href="" style="" class="finalizarVenda button icon tag">Efetuar venda</a>
           </div>
        </section>
        </div>
    </div>

    <div class="column right twothird">
        <table class="datatable cart">
            <thead>
                <tr>
                    <th title="Código">#</th>
                    <th>Nome</th>
                    <th>Valor</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($produtos as $produto) : ?>
                <?php if($produto['Produto']['quantidade'] > 0) : ?>
                    <tr>
	                        <td style="width:10px"><?php echo $produto['Produto']['id']; ?></td>
	                        <td><?php echo $produto['Produto']['nome']; ?></td>
	                        <td><?php echo $this->Number->format($produto['Produto']['valor'], array('before' => 'R$ ', 'decimals' => ',', 'thousands' => '.')) ?></td>
	                        <td style="width:200px" class="pid-<?php echo $produto['Produto']['id']; ?>">
	                            <span class="button-group">
	                                <?php echo $this->Html->link('Adicionar ao carrinho', array('controller' => '', 'action' => '', $produto['Produto']['id']), array('alt' => $produto['Produto']['id'].'|'.$this->Number->format($produto['Produto']['valor'], array('before' => 'R$ ', 'decimals' => ',', 'thousands' => '.')).'|'.$produto['Produto']['nome'].'|'.$produto['Produto']['descricao'], 'class' => 'button icon add addToCart')) ?>
	                                <?php echo $this->Html->link('', array('controller' => '', 'action' => '', $produto['Produto']['id']), array('style' => 'width:0; height:13px; display:none;', 'alt' => $produto['Produto']['id'], 'class' => 'button icon danger remove removeFromCart')) ?>
	                                <form class="qtd qtd-<?php echo $produto['Produto']['id'];?>" style="display:none; position: absolute;"><input style="width:30px; height:23px;margin: 0px 10px;" class="qtdNum" type="text" placeholder="Qtd." maxlength="4"></form>
	                            </span>
	                        </td>
                    </tr>
                    <?php endif; ?>       
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="clear"></div>
</section>