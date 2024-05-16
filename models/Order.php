<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property string $number
 * @property string $date_start
 * @property string $date_end
 * @property string $client
 * @property string|null $comment
 * @property string $description
 * @property int $user_id
 * @property int $type_equipment_id
 * @property int $type_problem_id
 * @property int $status_id
 *
 * @property Report[] $reports
 * @property Status $status
 * @property TypeEquipment $typeEquipment
 * @property TypeProblem $typeProblem
 * @property User $user
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['number', 'date_start', 'date_end', 'client', 'description', 'user_id', 'type_equipment_id', 'type_problem_id'], 'required'],
            [['date_start', 'date_end'], 'safe'],
            [['comment', 'description'], 'string'],
            [['user_id', 'type_equipment_id', 'type_problem_id', 'status_id'], 'integer'],
            [['number', 'client'], 'string', 'max' => 255],
            [['type_problem_id'], 'exist', 'skipOnError' => true, 'targetClass' => TypeProblem::class, 'targetAttribute' => ['type_problem_id' => 'id']],
            [['type_equipment_id'], 'exist', 'skipOnError' => true, 'targetClass' => TypeEquipment::class, 'targetAttribute' => ['type_equipment_id' => 'id']],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => Status::class, 'targetAttribute' => ['status_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'number' => 'Номер заявки',
            'date_start' => 'Дата начало',
            'date_end' => 'Дата ',
            'client' => 'Клиент',
            'comment' => 'Комментарий',
            'description' => 'Описание',
            'user_id' => 'Ответственный',
            'type_equipment_id' => 'Тип оборудования',
            'type_problem_id' => 'Тип неисправности',
            'status_id' => 'Статус',
        ];
    }

    /**
     * Gets query for [[Reports]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReports()
    {
        return $this->hasMany(Report::class, ['order_id' => 'id']);
    }

    /**
     * Gets query for [[Status]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Status::class, ['id' => 'status_id']);
    }

    /**
     * Gets query for [[TypeEquipment]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTypeEquipment()
    {
        return $this->hasOne(TypeEquipment::class, ['id' => 'type_equipment_id']);
    }

    /**
     * Gets query for [[TypeProblem]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTypeProblem()
    {
        return $this->hasOne(TypeProblem::class, ['id' => 'type_problem_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
