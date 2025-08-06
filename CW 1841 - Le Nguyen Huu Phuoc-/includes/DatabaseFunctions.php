<?php

function query($pdo, $sql, $parameters = []) {
    $query = $pdo->prepare($sql);
    $query->execute($parameters);
    return $query;
}

// ===================== POST (câu hỏi) =====================

function allPosts($pdo) {
    $query = query($pdo, 'SELECT posts.id, question, postdate, image, users.email, users.name AS user_name, modules.name AS module_name 
                          FROM posts 
                          JOIN users ON posts.usersid = users.id 
                          JOIN modules ON posts.moduleid = modules.id 
                          ORDER BY posts.postdate DESC');
    return $query->fetchAll();
}

function totalPosts($pdo) {
    $query = query($pdo, 'SELECT COUNT(*) FROM posts');
    $row = $query->fetch();
    return $row[0];
}

function getPost($pdo, $id) {
    $parameters = [':id' => $id];
    $query = query($pdo, 'SELECT * FROM posts WHERE id = :id', $parameters);
    return $query->fetch();
}

function insertPost($pdo, $question, $image, $usersid, $moduleid) {
    $query = 'INSERT INTO posts SET question = :question, postdate = CURDATE(), image = :image, usersid = :usersid, moduleid = :moduleid';
    $parameters = [
        ':question' => $question,
        ':image' => $image,
        ':usersid' => $usersid,
        ':moduleid' => $moduleid
    ];
    query($pdo, $query, $parameters);
}

function updatePost($pdo, $id, $question, $image) {
    $query = 'UPDATE posts SET question = :question, image = :image WHERE id = :id';
    $parameters = [
        ':question' => $question,
        ':image' => $image,
        ':id' => $id
    ];
    query($pdo, $query, $parameters);
}

function deletePost($pdo, $id) {
    $query = 'DELETE FROM posts WHERE id = :id';
    $parameters = [':id' => $id];
    query($pdo, $query, $parameters);
}

// ===================== USER =====================

function allUsers($pdo) {
    $query = query($pdo, 'SELECT * FROM users ORDER BY name');
    return $query->fetchAll();
}

function getUser($pdo, $id) {
    $parameters = [':id' => $id];
    $query = query($pdo, 'SELECT * FROM users WHERE id = :id', $parameters);
    return $query->fetch();
}

function insertUser($pdo, $name, $email, $password, $role = 'guest') {
    $query = 'INSERT INTO users SET name = :name, email = :email, password = :password, role = :role';
    $parameters = [
        ':name' => $name,
        ':email' => $email,
        ':password' => $password,
        ':role' => $role
    ];
    query($pdo, $query, $parameters);
}

function updateUser($pdo, $id, $name, $email, $password = null, $role = null) {
    
    if (empty($id) || empty($name) || empty($email)) {
        throw new Exception('Invalid input data. Please make sure name and email are provided.');
    }

    
    $query = 'UPDATE users SET name = :name, email = :email';
    
    
    if (!empty($password)) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT); 
        $query .= ', password = :password'; 
    }
    
    
    if (!empty($role)) {
        $query .= ', role = :role'; 
    }
    
    $query .= ' WHERE id = :id'; 

    
    $parameters = [
        ':name' => $name,
        ':email' => $email,
        ':id' => $id
    ];

    
    if (!empty($password)) {
        $parameters[':password'] = $hashedPassword;
    }

    
    if (!empty($role)) {
        $parameters[':role'] = $role;
    }

    try {
        
        $stmt = $pdo->prepare($query);
        $stmt->execute($parameters);

        
        $rowCount = $stmt->rowCount();
        if ($rowCount === 0) {
            throw new Exception('No rows updated. Please make sure the user ID exists.');
        }

    } catch (PDOException $e) {
        
        throw new Exception('Database error: ' . $e->getMessage());
    }
}


function deleteUser($pdo, $id) {
    $query = 'DELETE FROM users WHERE id = :id';
    $parameters = [':id' => $id];
    query($pdo, $query, $parameters);
}

function totalUsers($pdo) {
    $query = query($pdo, 'SELECT COUNT(*) FROM users');
    $row = $query->fetch();
    return $row[0];
}

// ===================== MODULE =====================

function allModules($pdo) {
    $query = query($pdo, 'SELECT * FROM modules ORDER BY name');
    return $query->fetchAll();
}

function getModule($pdo, $id) {
    $parameters = [':id' => $id];
    $query = query($pdo, 'SELECT * FROM modules WHERE id = :id', $parameters);
    return $query->fetch();
}

function insertModule($pdo, $name) {
    $query = 'INSERT INTO modules SET name = :name';
    $parameters = [':name' => $name];
    query($pdo, $query, $parameters);
}

function updateModule($pdo, $id, $name) {
    $query = 'UPDATE modules SET name = :name WHERE id = :id';
    $parameters = [
        ':name' => $name,
        ':id' => $id
    ];
    query($pdo, $query, $parameters);
}

function deleteModule($pdo, $id) {
    $query = 'DELETE FROM modules WHERE id = :id';
    $parameters = [':id' => $id];
    query($pdo, $query, $parameters);
}

function totalModules($pdo) {
    $query = query($pdo, 'SELECT COUNT(*) FROM modules');
    $row = $query->fetch();
    return $row[0];
}

function getUserByEmail($pdo, $email) {
    $parameters = [':email' => $email];
    $query = query($pdo, 'SELECT * FROM users WHERE email = :email', $parameters);
    return $query->fetch();
}

// ===================== CONTACT =====================

function insertContact($pdo, $userid, $text) {
    $parameters = [
        ':userid' => $userid,
        ':text' => $text
    ];
    query($pdo, 'INSERT INTO contact (userid, text) VALUES (:userid, :text)', $parameters);
}


function allContacts($pdo) {
    $contacts = query($pdo, 'SELECT c.id, u.name AS user_name, u.email, c.text, c.contactdate
                            FROM contact c
                            JOIN users u ON c.userid = u.id');
    return $contacts->fetchAll();
}
