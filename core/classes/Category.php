<?php

class Category extends Database
{
    public function addCategory($category)
    {
        $sql = "INSERT INTO category (category_name) VALUES (?)";
        return $this->executeNonQuery($sql, [$category]);
    }

    public function addSubcategory($subcategory, $parent_category_id)
    {
        $sql = "INSERT INTO subcategory (parent_category_id, subcategory_name) VALUES (?, ?)";
        return $this->executeNonQuery($sql, [$parent_category_id, $subcategory]);
    }

    public function getCategories()
    {
        $sql = "SELECT * FROM category";
        return $this->executeQuery($sql);
    }

    public function getCategoryById($category_id)
    {
        $sql = "SELECT * FROM category WHERE category_id = ?";
        return $this->executeQuery($sql, [$category_id]);
    }

    public function getSubcategories()
    {
        $sql = "SELECT * FROM subcategory";
        return $this->executeQuery($sql);
    }

    public function getSubcategoryById($subcategory_id)
    {
        $sql = "SELECT * FROM subcategory WHERE subcategory_id = ?";
        return $this->executeQuery($sql, [$subcategory_id]);
    }

    public function getSubcategoryByParentId($category_id)
    {
        $sql = "SELECT * FROM subcategory WHERE parent_category_id = ?";
        return $this->executeQuery($sql, [$category_id]);
    }
}
