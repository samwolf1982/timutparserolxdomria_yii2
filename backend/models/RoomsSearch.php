<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Rooms;

/**
 * RoomsSearch represents the model behind the search form about `common\models\Rooms`.
 */
class RoomsSearch extends Rooms
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'count_rooms', 'square', 'floor', 'floors'], 'integer'],
            [['shortdistrict','price', 'currency', 'type', 'district', 'street', 'description', 'own_or_business', 'manager', 'coment', 'url', 'site', 'img'], 'safe'],
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
        $query = Rooms::find();

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
           // 'price' => $this->price,
            'count_rooms' => $this->count_rooms,
            'square' => $this->square,
            'floor' => $this->floor,
            'floors' => $this->floors,
        ]);
        
        //      search price
          if(!empty($this->price) && strpos($this->price, '-') !== false)
         { 
            list($start_data, $end_data) = explode('-', $this->price);
             $query->andFilterWhere(['between', 'price', $start_data, $end_data]);
              }
        
        

        $query->andFilterWhere(['like', 'shortdistrict', $this->shortdistrict])
            ->andFilterWhere(['like', 'currency', $this->currency])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'district', $this->district])
            ->andFilterWhere(['like', 'street', $this->street])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'own_or_business', $this->own_or_business])
            ->andFilterWhere(['like', 'manager', $this->manager])
            ->andFilterWhere(['like', 'coment', $this->coment])
            ->andFilterWhere(['like', 'url', $this->url])
            ->andFilterWhere(['like', 'site', $this->site])
            ->andFilterWhere(['like', 'img', $this->img]);
            
             $query->orderBy([ 'id' => SORT_DESC,]);

        return $dataProvider;
    }
}
