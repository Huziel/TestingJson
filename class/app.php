<?php
class app
{
    public function getUsers()
    {
        $content = file_get_contents("https://jsonplaceholder.typicode.com/users");

        $result  = json_decode($content);

        $rs = $result;

?>
        <div class="table-responsive">
            <table class="table table-sm table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Alias</th>

                        <th>Herramientas</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($rs as $persona) {
                    ?>
                        <tr>
                            <td>
                                <?= $persona->id ?>
                            </td>
                            <td>
                                <?= $persona->name ?>
                            </td>
                            <td>
                                <?= $persona->username ?>
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col-12">
                                        <center>
                                            <button type="button" class="btn btn-dark" onclick="viewDetails('<?= $persona->id ?>')">Detalles</button>
                                        </center>
                                    </div>

                                </div>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

    <?php


        /* var_dump($result); */


    }
    public function getDetailsUser($id)
    {
        $content = file_get_contents("https://jsonplaceholder.typicode.com/users/$id");

        $result  = json_decode($content);

        $rs = $result;
    ?>
    
        <div class="row">
            <?php

            ?>
            <div class="col-6 divCard">

                <i class="fa-solid fa-id-badge"></i> <?= $rs->id ?>

            </div>
            <div class="col-6 divCard">

                <i class="fa-solid fa-user"></i> <?= $rs->name ?>

            </div>
            <div class="col-6 divCard">

                <i class="fa-solid fa-signature"></i> <?= $rs->username ?>

            </div>
            <div class="col-6 divCard">

                <i class="fa-solid fa-at"></i> <?= $rs->email ?>

            </div>
            <div class="col-6 divCard">

                <i class="fa-solid fa-map-location-dot"></i> <?= $rs->address->street ?>

            </div>
            <div class="col-6 divCard">

                <i class="fa-solid fa-phone"></i> <?= $rs->phone ?>

            </div>
            <div class="col-6 divCard">

                <i class="fa-solid fa-earth-americas"></i> <?= $rs->website ?>

            </div>
            <div class="col-6 divCard">

                <i class="fa-solid fa-briefcase"></i> <?= $rs->company->name ?>

            </div>


            <div class="col-6 divCard">
                <center>
                    <button type="button" class="btn btn-dark" onclick="viewPosts('<?= $rs->id ?>')">Posts</button>
                </center>
            </div>
            <div class="col-6 divCard">
                <center>
                    <button type="button" onclick="viewTodos('<?= $rs->id ?>')" class="btn btn-secondary">Todos</button>
                </center>
            </div>
        </div>
    <?php
    }
    public function getUserPost($id)
    {
        $content = file_get_contents("https://jsonplaceholder.typicode.com/users/$id/posts");

        $result  = json_decode($content);

        $rs = $result;

    ?>
    <button class="btn btn-secondary"  onclick="viewDetails('<?= $id ?>')"><-</button>
    <br>
        <div class="table-responsive">
            <table class="table table-sm table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Id User</th>
                        <th>Id</th>
                        <th>Titulo</th>
                        <th>Contenido</th>
                        <th>Comentarios</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($rs as $post) {
                    ?>
                        <tr>
                            <td scope="row"><?= $post->userId ?></td>
                            <td><?= $post->id ?></td>
                            <td><?= $post->title ?></td>
                            <td><?= $post->body ?></td>
                            <td>
                                <div class="row">
                                    <div class="col-12">
                                        <center>
                                            <button type="button" class="btn btn-dark" onclick="viewComments('<?= $post->id ?>','<?= $post->userId ?>')">Comentarios</button>
                                        </center>
                                    </div>

                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    <?php
    }
    public function getComments($id,$userData)
    {
        $content = file_get_contents("https://jsonplaceholder.typicode.com/post/$id/comments");

        $result  = json_decode($content);

        $rs = $result;

    ?>
    <button class="btn btn-secondary"  onclick="viewPosts('<?= $userData ?>')"><-</button>
    <br>
        <div class="table-responsive">
            <table class="table table-sm table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Id Post</th>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Mail</th>
                        <th>Contenido</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($rs as $post) {
                    ?>
                        <tr>
                            <td scope="row"><?= $post->postId ?></td>
                            <td><?= $post->id ?></td>
                            <td><?= $post->name ?></td>
                            <td><?= $post->email ?></td>
                            <td><?= $post->body ?></td>

                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    <?php
    }
    public function getTodos($id)
    {
        $content = file_get_contents("https://jsonplaceholder.typicode.com/users/$id/todos");

        $result  = json_decode($content);

        $rs = $result;

    ?>
    <button class="btn btn-secondary"  onclick="viewDetails('<?= $id ?>')"><-</button>
    <br>
        <div class="row">
            <input type="hidden" id="idForm" value="<?= $id ?>">
            <div class="col-12">
                <div class="mb-3">
                    <label for="" class="form-label">Tarea</label>
                    <textarea class="form-control" name="" id="Tarea" rows="3"></textarea>
                </div>
                <br>
                <div class="mb-3">
                  <label for="" class="form-label">Estado</label>
                  <select class="form-control" name="" id="check">
                    <option value="true">Terminado</option>
                    <option value="false">No terminado</option>
                   
                  </select>
                </div>
            </div>
        </div>
        <br>
        <div id="contenido"></div>
        <br>
        <center>
            <button type="button" onclick="add()" class="btn btn-dark">Guardar Tarea</button>
        </center>
        <br>
        <div class="table-responsive">
            <table class="table table-sm table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Id User</th>
                        <th>Id</th>
                        <th>Titulo</th>
                        <th>Completado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($rs as $todos) {
                    ?>
                        <tr>
                            <td scope="row"><?= $todos->userId ?></td>
                            <td><?= $todos->id ?></td>
                            <td><?= $todos->title ?></td>
                            <td><?= $todos->completed ?></td>


                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

<?php
    }
}
