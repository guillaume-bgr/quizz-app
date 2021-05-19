<?php

class themes extends database
{
    public $theme_id = 0;
    public $theme = '';
    public $description = '';
    private $tablename = 'themes';

    private function insertTheme()
    {
        $query = 'INSERT INTO ' . $this->tablename . '(
            `theme`,
            `description`
        )
        VALUES(
            :theme,
            :description,
        )';
        $insertTheme = $this->db->prepare($query);
        $insertTheme->bindValue(':theme', $this->theme, PDO::PARAM_STR);
        $insertTheme->bindValue(':description', $this->description, PDO::PARAM_INT);
        return $insertTheme->execute();
    }


    public function getAllThemes()
    {
        $query = 'SELECT `theme_id`, `theme`, `description` FROM  ' . $this->tablename . '';
        $themesList = $this->db->query($query);
        if (is_object($themesList)) {
            $themesListResult = $themesList->fetchAll(pdo::FETCH_OBJ);
        }
        return $themesListResult;
    }

    public function getThemebyId()
    {
        $query = 'SELECT `theme_id`, `theme`, `description` FROM ' . $this->tablename . ' WHERE theme_id = :theme_id';
        $getThemebyId = $this->db->prepare($query);
        $getThemebyId->bindValue(':theme_id', $this->theme_id, PDO::PARAM_INT);
        $getThemebyId->execute();
        if ($getThemebyId->execute()) {
            $question = $getThemebyId->fetch(PDO::FETCH_OBJ);
        }
        return $question;
    }

    public function updateTheme()
    {
        $query = 'UPDATE ' . $this->tablename . ' SET `theme` = :theme AND `theme = :theme` WHERE `theme_id` = :theme_id';
        $updateQuestionCategory = $this->db->prepare($query);
        $updateQuestionCategory->bindValue(':theme_id', $this->theme_id, PDO::PARAM_INT);
        $updateQuestionCategory->bindValue(':theme', $this->theme, PDO::PARAM_STR);
        return $updateQuestionCategory->execute();
    }

    public function updateThemeDescription()
    {
        $query = 'UPDATE ' . $this->tablename . ' SET `description` = :description WHERE `theme_id` = :theme_id';
        $updateThemeDescription = $this->db->prepare($query);
        $updateThemeDescription->bindValue(':theme_id', $this->theme_id, PDO::PARAM_INT);
        $updateThemeDescription->bindValue(':description', $this->description, PDO::PARAM_STR);
        return $updateThemeDescription->execute();
    }


    public function removeTheme()
    {
        $query = 'DELETE FROM ' . $this->tablename . ' WHERE `theme_id` = :theme_id';
        $removeTheme = $this->db->prepare($query);
        $removeTheme->bindValue(':theme_id', $this->theme_id, PDO::PARAM_INT);
        $removeTheme->execute();
        return $removeTheme;
    }
}
