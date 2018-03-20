<?php

/**
 *  Visualização de Cliente
 */
function view($id = null) {
  global $pessoa;
  $pessoa = find('pessoa', $id);
}

