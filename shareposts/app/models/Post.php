<?php
class Post
{
  private $db;
  public function __construct()
  {
    $this->db = new Database;
  }
  public function getPosts()
  {
    $this->db->query('
      SELECT * ,
      p.created_at as postCreated,
      p.id as postId
      FROM posts p
      Join users u
      ON p.user_id=u.id
      ORDER BY p.created_at DESC
    ');
    $results = $this->db->resultSet();
    return $results;
  }
  public function addPost($data)
  {
    $this->db->query("INSERT INTO posts(title,user_id,body) values(:title,:user_id,:body)");
    // Bind values
    $this->db->bind(':title', $data['title']);
    $this->db->bind(':user_id', $data['user_id']);
    $this->db->bind(':body', $data['body']);
    // Check operation status
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }
  public function editPost($data)
  {
    $this->db->query("UPDATE posts set title = :title , body = :body WHERE id=:id");
    // Bind values
    $this->db->bind(':id', $data['id']);
    $this->db->bind(':title', $data['title']);
    $this->db->bind(':body', $data['body']);
    // Check operation status
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }
  public function deletePost($id)
  {
    $this->db->query("DELETE FROM posts WHERE id=:id");
    // Bind values
    $this->db->bind(':id', $id);
    // Check operation status
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }
  public function getPostById($id)
  {
    $this->db->query('SELECT * FROM posts WHERE id = :id');
    $this->db->bind(':id', $id);
    $row = $this->db->single();
    return $row;
  }
}
