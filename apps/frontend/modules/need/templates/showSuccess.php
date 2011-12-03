<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $need->getId() ?></td>
    </tr>
    <tr>
      <th>Name:</th>
      <td><?php echo $need->getName() ?></td>
    </tr>
    <tr>
      <th>Description:</th>
      <td><?php echo $need->getDescription() ?></td>
    </tr>
    <tr>
      <th>Done:</th>
      <td><?php echo $need->getDone() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $need->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $need->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('need/edit?id='.$need->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('need/index') ?>">List</a>
