<?php

class scores extends database
{
    public $id = 0;
    public $user_id = 0;
    public $scorevalue = 0;
    private $tablename = 'scores';


    private function insertScore()
    {
        $query = 'INSERT INTO ' . $this->tablename . '(
            `user_id`,
            `scorevalue`
        )
        VALUES(
            :user_id,
            :scorevalue,
        )';
        $insertScore = $this->db->prepare($query);
        $insertScore->bindValue(':user_id', $this->user_id, PDO::PARAM_INT);
        $insertScore->bindValue(':scorevalue', $this->scorevalue, PDO::PARAM_INT);
        return $insertScore->execute();
    }


    public function getAllScores()
    {
        $query = 'SELECT `id`, `user_id`, `scorevalue` FROM  ' . $this->tablename . '';
        $scoresList = $this->db->query($query);
        if (is_object($scoresList)) {
            $scoresListResult = $scoresList->fetchAll(pdo::FETCH_OBJ);
        }
        return $scoresListResult;
    }

    public function getScorebyId()
    {
        $query = 'SELECT `id`, `user_id`, `scorevalue` FROM ' . $this->tablename . ' WHERE id = :id';
        $getScorebyId = $this->db->prepare($query);
        $getScorebyId->bindValue(':id', $this->id, PDO::PARAM_INT);
        $getScorebyId->execute();
        if ($getScorebyId->execute()) {
            $question = $getScorebyId->fetch(PDO::FETCH_OBJ);
        }
        return $question;
    }

    public function updateUser()
    {
        $query = 'UPDATE ' . $this->tablename . ' SET `user_id` = :user_id  WHERE `id` = :id';
        $updateUser = $this->db->prepare($query);
        $updateUser->bindValue(':id', $this->id, PDO::PARAM_INT);
        $updateUser->bindValue(':user_id', $this->user_id, PDO::PARAM_STR);
        return $updateUser->execute();
    }

    public function updateScoreValue()
    {
        $query = 'UPDATE ' . $this->tablename . ' SET `scorevalue` = :scorevalue WHERE `id` = :id';
        $updateScoreValue = $this->db->prepare($query);
        $updateScoreValue->bindValue(':id', $this->id, PDO::PARAM_INT);
        $updateScoreValue->bindValue(':scorevalue', $this->scorevalue, PDO::PARAM_STR);
        return $updateScoreValue->execute();
    }


    public function removeScore()
    {
        $query = 'DELETE FROM ' . $this->tablename . ' WHERE `id` = :id';
        $removeScore = $this->db->prepare($query);
        $removeScore->bindValue(':id', $this->id, PDO::PARAM_INT);
        $removeScore->execute();
        return $removeScore;
    }
}
