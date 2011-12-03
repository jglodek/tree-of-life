<h1>Needs List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Description</th>
      <th>Done</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($needs as $need): ?>
    <tr>
      <td><a href="<?php echo url_for('need/show?id='.$need->getId()) ?>"><?php echo $need->getId() ?></a></td>
      <td><?php echo $need->getName() ?></td>
      <td><?php echo $need->getDescription() ?></td>
      <td><?php echo $need->getDone() ?></td>
      <td><?php echo $need->getCreatedAt() ?></td>
      <td><?php echo $need->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('need/new') ?>">New</a>
