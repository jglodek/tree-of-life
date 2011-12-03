<h1>Helps List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Description</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($helps as $help): ?>
    <tr>
      <td><a href="<?php echo url_for('help/show?id='.$help->getId()) ?>"><?php echo $help->getId() ?></a></td>
      <td><?php echo $help->getName() ?></td>
      <td><?php echo $help->getDescription() ?></td>
      <td><?php echo $help->getCreatedAt() ?></td>
      <td><?php echo $help->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('help/new') ?>">New</a>
