<?php

namespace frontend\modules\inven\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\inven\models\Invendetails;

/**
 * InvendetailsSearch represents the model behind the search form about `frontend\modules\inven\models\Invendetails`.
 */
class InvendetailsSearch extends Invendetails
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'main_id', 'product_id', 'qty'], 'integer'],
            [['remark'], 'safe'],
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
        $query = Invendetails::find();

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
            'main_id' => $this->main_id,
            'product_id' => $this->product_id,
            'qty' => $this->qty,
        ]);

        $query->andFilterWhere(['like', 'remark', $this->remark]);

        return $dataProvider;
    }
}
