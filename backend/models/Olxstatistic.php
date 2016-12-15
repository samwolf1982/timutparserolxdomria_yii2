<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Olxstatistic as OlxstatisticModel;

/**
 * Olxstatistic represents the model behind the search form about `common\models\Olxstatistic`.
 */
class Olxstatistic extends OlxstatisticModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'someelse'], 'integer'],
            [['shorturl', 'fullurl', 'someelse2'], 'safe'],
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
        $query = OlxstatisticModel::find();

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
            'id' => $this->id,
            'someelse' => $this->someelse,
        ]);

        $query->andFilterWhere(['like', 'shorturl', $this->shorturl])
            ->andFilterWhere(['like', 'fullurl', $this->fullurl])
            ->andFilterWhere(['like', 'someelse2', $this->someelse2]);

        return $dataProvider;
    }
}
