<?php

namespace app\modules\user\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\user\models\User;

/**
 * UserSearch represents the model behind the search form about `app\modules\user\models\User`.
 */
class UserSearch extends User
{
    public $department;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return "{{%user}}";
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'role_id', 'department_id', 'status'], 'integer'],
            [['email', 'username', 'fullname', 'created_at', 'updated_at', 'fullname'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * @inheritdoc
     */
//    public function attributes()
//    {
//        // add related fields to searchable attributes
//        return array_merge(parent::attributes(), ['profile.full_name']);
//    }

    /**
     * Search
     * @param array $params
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        /** @var \app\modules\user\models\User $user */
        /** @var \app\modules\user\models\Profile $profile */

        // get models
        $user = $this->module->model("User");

        $query = $user::find();

        // create data provider
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

//        // enable sorting for the related columns
//        $addSortAttributes = ["profile.full_name"];
//        foreach ($addSortAttributes as $addSortAttribute) {
//            $dataProvider->sort->attributes[$addSortAttribute] = [
//                'asc' => [$addSortAttribute => SORT_ASC],
//                'desc' => [$addSortAttribute => SORT_DESC],
//            ];
//        }

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'role_id' => $this->role_id,
            'department_id' => $this->department_id,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'fullname', $this->fullname]);

        return $dataProvider;
    }
}