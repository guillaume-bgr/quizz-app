<?php
class questions extends database
{
    public $id = 0;
    public $question_category = '';
    public $theme_id = 0;
    public $question_cat_id = 0;
    public $question_type = '';
    public $question = '';
    public $option1 = '';
    public $option2 = '';
    public $option3 = '';
    public $option4 = '';
    public $answer = '';

    private $tablename = 'questions';

    private function insertQuestion()
    {
        $query = 'INSERT INTO ' . $this->tablename . '(
            `id`,
            `question_category`,
            `theme_id`,
            `question_cat_id`,
            `question_type`,
            `question`,
            `option1`,
            `option2`,
            `option3`,
            `option4`,
            `answer`
        )
        VALUES(
            :question_category,
            :theme_id,
            :question_cat_id,
            :question_type,
            :question,
            :option1,
            :option2,
            :option3,
            :option4,
            :answer,
        )';
        $insertQuestion = $this->db->prepare($query);
        $insertQuestion->bindValue(':question_category', $this->question_category, PDO::PARAM_STR);
        $insertQuestion->bindValue(':theme_id', $this->theme_id, PDO::PARAM_INT);
        $insertQuestion->bindValue(':question_cat_id', $this->question_cat_id, PDO::PARAM_INT);
        $insertQuestion->bindValue(':question_type', $this->question_type, PDO::PARAM_STR);
        $insertQuestion->bindValue(':question', $this->question, PDO::PARAM_STR);
        $insertQuestion->bindValue(':option1', $this->option1, PDO::PARAM_STR);
        $insertQuestion->bindValue(':option2', $this->option2, PDO::PARAM_STR);
        $insertQuestion->bindValue(':option3', $this->option3, PDO::PARAM_STR);
        $insertQuestion->bindValue(':option4', $this->option4, PDO::PARAM_STR);
        $insertQuestion->bindValue(':answer', $this->answer, PDO::PARAM_STR);
        return $insertQuestion->execute();
    }


    public function getAllQuestions()
    {
        $query = 'SELECT `id`, `question_category`, `theme_id`, `question_cat_id`, `question_type`, `question`, `option1`, `option2`, `option3`, `option4`, `answer` FROM ' . $this->tablename . '';
        $questionList = $this->db->query($query);
        if (is_object($questionList)) {
            $questionListResult = $questionList->fetchAll(pdo::FETCH_OBJ);
        }
        return $questionListResult;
    }

    public function getQuestionbyId()
    {
        $query = 'SELECT
        `id`, `question_category`, `theme_id`, `question_cat_id`, `question_type`, `question`, `option1`, `option2`, `option3`, `option4`, `answer` FROM ' . $this->tablename . ' WHERE id = :id';
        $getQuestionById = $this->db->prepare($query);
        $getQuestionById->bindValue(':id', $this->id, PDO::PARAM_INT);
        $getQuestionById->execute();
        if ($getQuestionById->execute()) {
            $question = $getQuestionById->fetch(PDO::FETCH_OBJ);
        }
        return $question;
    }

    public function updateQuestionCategory()
    {
        $query = 'UPDATE ' . $this->tablename . ' SET `question_category` = :question_category AND `question_cat_id = :question_cat_id` WHERE `id` = :id';
        $updateQuestionCategory = $this->db->prepare($query);
        $updateQuestionCategory->bindValue(':id', $this->id, PDO::PARAM_INT);
        $updateQuestionCategory->bindValue(':question_category', $this->question_category, PDO::PARAM_STR);
        $updateQuestionCategory->bindValue(':question_category_id', $this->question_category_id, PDO::PARAM_INT);
        return $updateQuestionCategory->execute();
    }


    public function updateTheme()
    {
        $query = 'UPDATE ' . $this->tablename . ' SET `theme_id` = :theme_id WHERE `id` = :id';
        $updateTheme = $this->db->prepare($query);
        $updateTheme->bindValue(':id', $this->id, PDO::PARAM_INT);
        $updateTheme->bindValue(':theme_id', $this->theme_id, PDO::PARAM_INT);
        return $updateTheme->execute();
    }

    public function updateQuestionType()
    {
        $query = 'UPDATE ' . $this->tablename . ' SET `question_type` = :question_type WHERE `id` = :id';
        $updateQuestionType = $this->db->prepare($query);
        $updateQuestionType->bindValue(':id', $this->id, PDO::PARAM_INT);
        $updateQuestionType->bindValue(':question_type', $this->question_type, PDO::PARAM_INT);
        return $updateQuestionType->execute();
    }

    public function updateQuestion()
    {
        $query = 'UPDATE ' . $this->tablename . ' SET `question` = :question WHERE `id` = :id';
        $updateQuestion = $this->db->prepare($query);
        $updateQuestion->bindValue(':id', $this->id, PDO::PARAM_INT);
        $updateQuestion->bindValue(':question', $this->question_type, PDO::PARAM_STR);
        return $updateQuestion->execute();
    }

    public function updateOption1()
    {
        $query = 'UPDATE ' . $this->tablename . ' SET `option1` = :option1 WHERE `id` = :id';
        $updateOption1 = $this->db->prepare($query);
        $updateOption1->bindValue(':id', $this->id, PDO::PARAM_INT);
        $updateOption1->bindValue(':option1', $this->option1, PDO::PARAM_STR);
        return $updateOption1->execute();
    }

    public function updateOption2()
    {
        $query = 'UPDATE ' . $this->tablename . ' SET `option2` = :option2 WHERE `id` = :id';
        $updateOption2 = $this->db->prepare($query);
        $updateOption2->bindValue(':id', $this->id, PDO::PARAM_INT);
        $updateOption2->bindValue(':option2', $this->option2, PDO::PARAM_STR);
        return $updateOption2->execute();
    }

    public function updateOption3()
    {
        $query = 'UPDATE ' . $this->tablename . ' SET `option3` = :option3 WHERE `id` = :id';
        $updateOption3 = $this->db->prepare($query);
        $updateOption3->bindValue(':id', $this->id, PDO::PARAM_INT);
        $updateOption3->bindValue(':option3', $this->option3, PDO::PARAM_STR);
        return $updateOption3->execute();
    }

    public function updateOption4()
    {
        $query = 'UPDATE ' . $this->tablename . ' SET `option4` = :option4 WHERE `id` = :id';
        $updateOption4 = $this->db->prepare($query);
        $updateOption4->bindValue(':id', $this->id, PDO::PARAM_INT);
        $updateOption4->bindValue(':option4', $this->option4, PDO::PARAM_STR);
        return $updateOption4->execute();
    }

    public function updateAnswer()
    {
        $query = 'UPDATE ' . $this->tablename . ' SET `answer` = :answer WHERE `id` = :id';
        $updateAnswer = $this->db->prepare($query);
        $updateAnswer->bindValue(':id', $this->id, PDO::PARAM_INT);
        $updateAnswer->bindValue(':answer', $this->answer, PDO::PARAM_STR);
        return $updateAnswer->execute();
    }

    public function removeQuestion()
    {
        $query = 'DELETE FROM ' . $this->tablename . ' WHERE `ìd` = :id';
        $removeQuestion = $this->db->prepare($query);
        $removeQuestion->bindValue(':id', $this->id, PDO::PARAM_INT);
        $removeQuestion->execute();
        return $removeQuestion;
    }
}
