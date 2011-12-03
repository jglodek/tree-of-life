<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $help->getId() ?></td>
    </tr>
    <tr>
      <th>Name:</th>
      <td><?php echo $help->getName() ?></td>
    </tr>
    <tr>
      <th>Description:</th>
      <td><?php echo $help->getDescription() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $help->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $help->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('help/edit?id='.$help->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('help/index') ?>">List</a>
