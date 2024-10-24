<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Manuals Controller
 *
 * @property \App\Model\Table\ManualsTable $Manuals
 */
class ManualsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Manuals->find();
        $manuals = $this->paginate($query);

        $this->set(compact('manuals'));
    }

    /**
     * View method
     *
     * @param string|null $id Manual id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $manual = $this->Manuals->get($id, contain: [
            'Videos' => [
                'conditions' => ['Videos.deleted IS' => null],
                'sort' => ['Videos.sort_order' => 'ASC']
            ]
        ]);
        $this->set(compact('manual'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $manual = $this->Manuals->newEmptyEntity();
        if ($this->request->is('post')) {
            $manual = $this->Manuals->patchEntity($manual, $this->request->getData());
            if ($this->Manuals->save($manual)) {
                $this->Flash->success(__('The manual has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The manual could not be saved. Please, try again.'));
        }
        $this->set(compact('manual'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Manual id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $manual = $this->Manuals->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $manual = $this->Manuals->patchEntity($manual, $this->request->getData());
            if ($this->Manuals->save($manual)) {
                $this->Flash->success(__('The manual has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The manual could not be saved. Please, try again.'));
        }
        $this->set(compact('manual'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Manual id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $manual = $this->Manuals->get($id);
        if ($this->Manuals->delete($manual)) {
            $this->Flash->success(__('The manual has been deleted.'));
        } else {
            $this->Flash->error(__('The manual could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
