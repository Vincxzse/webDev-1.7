<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Item</title>
    <link rel="stylesheet" href="admindb.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Protest+Strike&display=swap" rel="stylesheet">
</head>
<body>
    <div id="main">
        <!-- NAVIGATION -->
        <div class="navigation">
            <div class="admin-profile">
                <div class="admin-header">
                    <img src="./pictures/profile.png" alt="">
                    <h2>Hello, Admin</h2>
                </div>
                <hr>
            </div>
            <div class="nav-links">
                <a href="" class="selection" id="lip-btn">Lips</a>
                <a href="" class="selection" id="face-btn">Face</a>
                <a href="" class="selection" id="hair-btn">Hair</a>
                <a href="" class="selection" id="skin-btn">Skin</a>
                <a href="" class="selection" id="underarm-btn">Underarm</a>
            </div>
        </div>

        <div class="show-up">
            <!-- LIPS -->
            <div class="to-show lips" id="lips-div">

                <h2>Lips</h2>
                <!-- FORMS -->
                <div class="to-show-form">
                    <form action="lips.php" method="POST" enctype="multipart/form-data">
                        <div class="input-set">
                            <label for="content_lips">Content:</label>
                            <input type="text" id="content_lips" name="content" required>
                        </div>
                        <div class="input-set">
                            <label for="content_picture_lips">Upload Picture:</label>
                            <input type="file" id="content_picture_lips" name="fileInput" accept="image/*">
                        </div>
                        
                        <div class="input-set">
                            <label for="description_lips">Description:</label>
                            <textarea id="description_lips" name="description" required></textarea>
                        </div>
            
                        <button type="submit">Submit</button>
                    </form>
            
                    <form action="lipsupdateitem.php" method="POST" enctype="multipart/form-data">
                        <div class="input-set">
                            <label for="content_lips_update">Put item to change in our list:</label>
                            <input type="text" id="content_lips_update" name="content" required>
                        </div>
                        <div class="input-set">
                            <label for="content_picture_lips_update">Change Picture:</label>
                            <input type="file" id="content_picture_lips_update" name="fileInput" accept="image/*">
                        </div>
                       
                        <div class="input-set">
                            <label for="description_lips_update">Change Description:</label>
                            <textarea id="description_lips_update" name="description" required></textarea>
                        </div>
            
                        <button type="submit">Submit</button>
                    </form>
            
                    <form action="lipsdelete.php" method="GET">
                        <label for="id_lips">Delete item by id:</label>
                        <input type="text" id="id_lips" name="id" required>
                        <input type="submit" value="Delete" class="delete-button">
                    </form>
                </div>
        
        
                <?php
                include('connection.php');
        
                $sql = 'SELECT * FROM lips';
                try {
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute();
                    $lips = $stmt->fetchAll(PDO::FETCH_ASSOC);
                } catch (PDOException $e) {
                    echo 'Error: ' . $e->getMessage();
                }
        
                if ($lips):
                ?>
                    <h2>Lips Item List</h2>
                    <table border="1">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Picture</th>
                            <th>Description</th>
                            <th>Created At</th>
                        </tr>
                        <?php foreach ($lips as $item): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($item['id']); ?></td>
                                <td><?php echo htmlspecialchars($item['content']); ?></td>
                                <td><img src="<?php echo htmlspecialchars($item['content_picture']); ?>" alt="Item Picture" width="100"></td>
                                <td><?php echo htmlspecialchars($item['description']); ?></td>
                                <td><?php echo htmlspecialchars($item['created_at']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                <?php else: ?>
                    <p>No 'Lipss found.</p>
                <?php endif; ?>
            </div>
            <!-- END OF LIPS -->
    
            <hr>
            
            <!-- FACE -->
            <div class="to-show face hidden" id="face-div">
                <h2>Face</h2>
                <div class="to-show-form">
                    <form action="face.php" method="POST" enctype="multipart/form-data">
                        <div class="input-set">
                            <label for="content_face">Content:</label>
                            <input type="text" id="content_face" name="content" required>
                        </div>
                        <div class="input-set">
                            <label for="content_picture_face">Upload Picture:</label>
                            <input type="file" id="content_picture_face" name="fileInput" accept="image/*">
                        </div>
                     
                        <div class="input-set">
                            <label for="description_face">Description:</label>
                            <textarea id="description_face" name="description" required></textarea>
                        </div>

                        <button type="submit">Submit</button>
                    </form>

                    <form action="faceupdateitem.php" method="POST" enctype="multipart/form-data">
                        <div class="input-set">
                            <label for="content_face_update">Put item to change in our list:</label>
                            <input type="text" id="content_face_update" name="content" required>
                        </div>
                        <div class="input-set">
                            <label for="content_picture_face_update">Change Picture:</label>
                            <input type="file" id="content_picture_face_update" name="fileInput" accept="image/*">
                        </div>
                    
                        <div class="input-set">
                            <label for="description_face_update">Change Description:</label>
                            <textarea id="description_face_update" name="description" required></textarea>
                        </div>

                        <button type="submit">Submit</button>
                    </form>

                    <form action="facedelete.php" method="GET">
                        <label for="id_face">Delete item by id:</label>
                        <input type="text" id="id_face" name="id" required>
                        <input type="submit" value="Delete" class="delete-button">
                    </form>
                </div>
        
                <?php
                $sql = 'SELECT * FROM face';
                try {
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute();
                    $face = $stmt->fetchAll(PDO::FETCH_ASSOC);
                } catch (PDOException $e) {
                    echo 'Error: ' . $e->getMessage();
                }
        
                if ($face):
                ?>
                    <h2>Face Item List</h2>
                    <table border="1">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Picture</th>
                            <th>Description</th>
                            <th>Created At</th>
                        </tr>
                        <?php foreach ($face as $item): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($item['id']); ?></td>
                                <td><?php echo htmlspecialchars($item['content']); ?></td>
                                <td><img src="<?php echo htmlspecialchars($item['content_picture']); ?>" alt="Item Picture" width="100"></td>
                                <td><?php echo htmlspecialchars($item['description']); ?></td>
                                <td><?php echo htmlspecialchars($item['created_at']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                <?php else: ?>
                    <p>No 'Faces found.</p>
                <?php endif; ?>
            </div>
            <!-- END OF FACE -->
    
            <!-- HAIR -->
            <div class="to-show hair hidden" id="hair-div">
                <h2>Hair</h2>
                <div class="to-show-form">

                    <form action="hair.php" method="POST" enctype="multipart/form-data">
                        <div class="input-set">
                            <label for="content_hair">Content:</label>
                            <input type="text" id="content_hair" name="content" required>
                        </div>
                        <div class="input-set">
                            <label for="content_picture_hair">Upload Picture:</label>
                            <input type="file" id="content_picture_hair" name="fileInput" accept="image/*">
                        </div>
                    
                        <div class="input-set">
                            <label for="description_hair">Description:</label>
                            <textarea id="description_hair" name="description" required></textarea>
                        </div>
                        <div class="input-set">
                            <label for="direction_hair">Direction for use:</label>
                            <textarea id="direction_hair" name="direction" required></textarea>
                        </div>

                        <button type="submit">Submit</button>
                    </form>

                    <form action="hairupdateitem.php" method="POST" enctype="multipart/form-data">
                        <div class="input-set">
                            <label for="content_hair_update">Put item to change in our list:</label>
                            <input type="text" id="content_hair_update" name="content" required>
                        </div>
                        <div class="input-set">
                            <label for="content_picture_hair_update">Change Picture:</label>
                            <input type="file" id="content_picture_hair_update" name="fileInput" accept="image/*">
                        </div>
                       
                        <div class="input-set">
                            <label for="description_hair_update">Change Description:</label>
                            <textarea id="description_hair_update" name="description" required></textarea>
                        </div>

                        <button type="submit">Submit</button>
                    </form>

                    <form action="hairdelete.php" method="GET">
                        <label for="id_hair">Delete item by id:</label>
                        <input type="text" id="id_hair" name="id" required>
                        <input type="submit" value="Delete" class="delete-button">
                    </form>
                </div>
        
        
                <?php
                $sql = 'SELECT * FROM hair';
                try {
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute();
                    $hair = $stmt->fetchAll(PDO::FETCH_ASSOC);
                } catch (PDOException $e) {
                    echo 'Error: ' . $e->getMessage();
                }
        
                if ($hair):
                ?>
                    <h2>Hair Item List</h2>
                    <table border="1">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Picture</th>
                            <th>Description</th>
                            <th>Created At</th>
                        </tr>
                        <?php foreach ($hair as $item): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($item['id']); ?></td>
                                <td><?php echo htmlspecialchars($item['content']); ?></td>
                                <td><img src="<?php echo htmlspecialchars($item['content_picture']); ?>" alt="Item Picture" width="100"></td>
                                <td><?php echo htmlspecialchars($item['description']); ?></td>
                                <td><?php echo htmlspecialchars($item['created_at']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                <?php else: ?>
                    <p>No 'Hairs found.</p>
                <?php endif; ?>
            </div>
            <!-- END OF HAIR -->
            
            <!-- SKIN -->
            <div class="to-show skin hidden" id="skin-div">
                <h2>Skin</h2>
                <div class="to-show-form">
                    <form action="skin.php" method="POST" enctype="multipart/form-data">
                        <div class="input-set">
                            <label for="content_skin">Content:</label>
                            <input type="text" id="content_skin" name="content" required>
                        </div>
                        <div class="input-set">
                            <label for="content_picture_skin">Upload Picture:</label>
                            <input type="file" id="content_picture_skin" name="fileInput" accept="image/*">
                        </div>
                       
                        <div class="input-set">
                            <label for="description_skin">Description:</label>
                            <textarea id="description_skin" name="description" required></textarea>
                        </div>

                        <button type="submit">Submit</button>
                    </form>

                    <form action="skinupdateitem.php" method="POST" enctype="multipart/form-data">
                        <div class="input-set">
                            <label for="content_skin_update">Put item to change in our list:</label>
                            <input type="text" id="content_skin_update" name="content" required>
                        </div>
                        <div class="input-set">
                            <label for="content_picture_skin_update">Change Picture:</label>
                            <input type="file" id="content_picture_skin_update" name="fileInput" accept="image/*">
                        </div>
                     
                        <div class="input-set">
                            <label for="description_skin_update">Change Description:</label>
                            <textarea id="description_skin_update" name="description" required></textarea>
                        </div>

                        <button type="submit">Submit</button>
                    </form>

                    <form action="skindelete.php" method="GET">
                        <div class="input-set">
                            <label for="id_skin">Delete item by id:</label>
                            <input type="text" id="id_skin" name="id" required>
                        </div>
                        <input type="submit" value="Delete" class="delete-button">
                    </form>
                </div>
        
                <?php
                $sql = 'SELECT * FROM skin';
                try {
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute();
                    $skin = $stmt->fetchAll(PDO::FETCH_ASSOC);
                } catch (PDOException $e) {
                    echo 'Error: ' . $e->getMessage();
                }
        
                if ($skin):
                ?>
                    <h2>skin Item List</h2>
                    <table border="1">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Picture</th>
                            <th>Description</th>
                            <th>Created At</th>
                        </tr>
                        <?php foreach ($skin as $item): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($item['id']); ?></td>
                                <td><?php echo htmlspecialchars($item['content']); ?></td>
                                <td><img src="<?php echo htmlspecialchars($item['content_picture']); ?>" alt="Item Picture" width="100"></td>
                                <td><?php echo htmlspecialchars($item['description']); ?></td>
                                <td><?php echo htmlspecialchars($item['created_at']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                <?php else: ?>
                    <p>No 'skins found.</p>
                <?php endif; ?>
            </div>
            <!-- END OF SKIN -->
            
            <!-- UNDERARM -->
            <div class="to-show underarm hidden" id="underarm-div">
                <h2>Underarm</h2>
                <div class="to-show-form">
                    <form action="underarm.php" method="POST" enctype="multipart/form-data">
                        <div class="input-set">
                            <label for="content_underarm">Content:</label>
                            <input type="text" id="content_underarm" name="content" required>
                        </div>
                        <div class="input-set">
                            <label for="content_picture_underarm">Upload Picture:</label>
                            <input type="file" id="content_picture_underarm" name="fileInput" accept="image/*">
                        </div>
                       
                        <div class="input-set">
                            <label for="description_underarm">Description:</label>
                            <textarea id="description_underarm" name="description" required></textarea>
                        </div>

                        <button type="submit">Submit</button>
                    </form>

                    <form action="underarmupdateitem.php" method="POST" enctype="multipart/form-data">
                        <div class="input-set">
                            <label for="content_underarm_update">Put item to change in our list:</label>
                            <input type="text" id="content_underarm_update" name="content" required>
                        </div>
                        <div class="input-set">
                            <label for="content_picture_underarm_update">Change Picture:</label>
                            <input type="file" id="content_picture_underarm_update" name="fileInput" accept="image/*">
                        </div>
                      
                        <div class="input-set">
                            <label for="description_underarm_update">Change Description:</label>
                            <textarea id="description_underarm_update" name="description" required></textarea>
                        </div>

                        <button type="submit">Submit</button>
                    </form>

                    <form action="underarmdelete.php" method="GET">
                        <div class="input-set">
                            <label for="id_underarm">Delete item by id:</label>
                            <input type="text" id="id_underarm" name="id" required>
                        </div>
                        <input type="submit" value="Delete" class="delete-button">
                    </form>
                </div>
        
                <?php
                $sql = 'SELECT * FROM underarm';
                try {
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute();
                    $underarm = $stmt->fetchAll(PDO::FETCH_ASSOC);
                } catch (PDOException $e) {
                    echo 'Error: ' . $e->getMessage();
                }
        
                if ($underarm):
                ?>
                    <h2>Underarm Item List</h2>
                    <table border="1">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Picture</th>
                            <th>Description</th>
                            <th>Created At</th>
                        </tr>
                        <?php foreach ($underarm as $item): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($item['id']); ?></td>
                                <td><?php echo htmlspecialchars($item['content']); ?></td>
                                <td><img src="<?php echo htmlspecialchars($item['content_picture']); ?>" alt="Item Picture" width="100"></td>
                                <td><?php echo htmlspecialchars($item['description']); ?></td>
                                <td><?php echo htmlspecialchars($item['created_at']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                <?php else: ?>
                    <p>No 'Underarms found.</p>
                <?php endif; ?>
            </div>
            <!-- END OF UNDERARM -->

    <script>
        // Buttons
        const lipsButton = document.getElementById('lip-btn');
        const faceButton = document.getElementById('face-btn');
        const hairButton = document.getElementById('hair-btn');
        const skinButton = document.getElementById('skin-btn');
        const underarmButton = document.getElementById('underarm-btn');
        const makeupButton = document.getElementById('makeup-btn');

        // Divs
        const lipShow = document.getElementById('lips-div');
        const faceShow = document.getElementById('face-div');
        const hairShow = document.getElementById('hair-div');
        const skinShow = document.getElementById('skin-div');
        const underarmShow = document.getElementById('underarm-div');
        const makeupShow = document.getElementById('makeup-div');

        // Navigation functionalities

        // Lips
        lipsButton.addEventListener('click', function(event) {
            event.preventDefault();

            if (lipShow.classList.contains('hidden')) {
                lipShow.classList.remove('hidden');
                faceShow.classList.add('hidden');
                hairShow.classList.add('hidden');
                skinShow.classList.add('hidden');
                underarmShow.classList.add('hidden');
                makeupShow.classList.add('hidden');
            } else {
                lipShow.classList.add('hidden');
            }
        });
        
        // Face
        faceButton.addEventListener('click', function(event) {
            event.preventDefault();
            if (faceShow.classList.contains('hidden')) {
                faceShow.classList.remove('hidden');
                lipShow.classList.add('hidden');
                hairShow.classList.add('hidden');
                skinShow.classList.add('hidden');
                underarmShow.classList.add('hidden');
                makeupShow.classList.add('hidden');
            } else {
                faceShow.classList.add('hidden');
            }
        });

        // Hair
        hairButton.addEventListener('click', function(event) {
            event.preventDefault();
            if (hairShow.classList.contains('hidden')) {
                hairShow.classList.remove('hidden');
                lipShow.classList.add('hidden');
                faceShow.classList.add('hidden');
                skinShow.classList.add('hidden');
                underarmShow.classList.add('hidden');
                makeupShow.classList.add('hidden');
            } else {
                hairShow.classList.add('hidden');
            }
        });
        
        // Skin
        skinButton.addEventListener('click', function(event) {
            event.preventDefault();
            if (skinShow.classList.contains('hidden')) {
                skinShow.classList.remove('hidden');
                lipShow.classList.add('hidden');
                faceShow.classList.add('hidden');
                hairShow.classList.add('hidden');
                underarmShow.classList.add('hidden');
                makeupShow.classList.add('hidden');
            } else {
                skinShow.classList.add('hidden');
            }
        });
        
        // Underarms
        underarmButton.addEventListener('click', function(event) {
            event.preventDefault();
            if (underarmShow.classList.contains('hidden')) {
                underarmShow.classList.remove('hidden');
                lipShow.classList.add('hidden');
                faceShow.classList.add('hidden');
                hairShow.classList.add('hidden');
                skinShow.classList.add('hidden');
                makeupShow.classList.add('hidden');
            } else {
                underarmShow.classList.add('hidden');
            }
        });
        
      
    </script>
    
</body>
</html>