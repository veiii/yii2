<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Choices;

/**
 * CountrySearch represents the model behind the search form about `app\models\Country`.
 */
class ChoicesSearch extends Choices
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'study_id', 'points'], 'required'],
            [['user_id', 'study_id', 'points', 'result'], 'integer'],
            [['user_id'],'isId'],
            [['points'], 'isRightPoints'],
            [['study_id'], 'onlyOne']
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
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Choices::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'study_id', $this->study_id])
            ->andFilterWhere(['like', 'points', $this->points]);

        return $dataProvider;
    }
}
