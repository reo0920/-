<?php

// デバック練習
// 氏名入力時に入力内容が表示されるようにプログラムを完成させてください。

namespace hoge;

class SelfIntroduction
{
    private $lastName;
    private $firstName;
    private $age;
    private $hobby;

    public function __construct(
        string $lastName,
        string $firstName,
        int $age,
        string $hobby
    ) {
            $this->lastName     = $lastName;
            $this->firstName    = $firstName;
            $this->age          = $age;
            $this->hobby        = $hobby;
    }
    public function getFullName()
    {
        return $this->lastName.$this->firstName;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function getHobby()
    {
        return $this->hobby;
    }
}
    
if (! empty($_POST)) {
    $me = new SelfIntroduction($_POST['last_name'], $_POST['first_name'], $_POST['age'], $_POST['hobby']);
    echo '私の名前は'.$me->getFullName().'年齢は'.$me->getAge().'です。';
    echo '<br>';
    echo '趣味は'. $me->getHobby().'です。';
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>デバック練習</title>
</head>
<body>
    <section>
    <form action='debug02.php' method="post">
        <label>姓</label>
        <input type="text" name="last_name"/>
        <label>名</label>
        <input type="text" name="first_name" />
        <label>趣味</label>
        <input type="text" name="hobby" />
        <select name="age" id="age">
    <?php $createAgeGroup = function () {
    $maxAge = 70;
    $minAge = 18;
    $ageGroup = array();
    for ($i = $minAge; $i <= $maxAge; $i++) {
        array_push($ageGroup, $i);
    }
    return $ageGroup;
    };?>
        <?php foreach ($createAgeGroup() as $value) : ?>
                <option><?=$value?></option>
        <?php endforeach; ?>
        </select>
        <input type="submit" value="送信する"/>
    </form>
    </section>
</body>
</html>