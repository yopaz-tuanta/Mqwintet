<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Routing\Router;

/**
 * Videos Controller
 *
 * @property \App\Model\Table\VideosTable $Videos
 */
class VideosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Videos->find()
            ->contain(['Manuals']);
        $videos = $this->paginate($query);

        $this->set(compact('videos'));
    }

    /**
     * View method
     *
     * @param string|null $id Video id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $video = $this->Videos->get($id, contain: ['Manuals']);
        $this->set(compact('video'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $video = $this->Videos->newEmptyEntity();
        if ($this->request->is('post')) {
            $video = $this->Videos->patchEntity($video, $this->request->getData());
            // dd($this->request->getData('file'));
            $video_url = $this->saveFile($this->request->getData('file'));
            if ($video_url) {
                $video->video_url = $video_url;
                if ($this->Videos->save($video)) {
                    $this->Flash->success(__('The video has been saved.'));
                    return $this->redirect(['action' => 'index']);
                }
            } else {
                $this->Flash->error(__('The video could not be saved. Please, try again.'));
            }
        }
        $manuals = $this->Videos->Manuals->find('list', limit: 200)->all();
        $this->set(compact('video', 'manuals'));
    }

    public function saveFile($file)
    {
        // dd($file->getFile());
        if (!empty($file) && $file->getError() === 0) {
            $video_url = $file->getClientFilename();
            $filePath = WWW_ROOT . 'uploads/videos/'. $video_url;
            // dd($filePath);
            $file->moveTo($filePath);
            // Di chuyển file vào thư mục uploads/videos/
            if (is_file($filePath)) {
                return $video_url;
            }
        }
        dd($file);
        return false;
    }

    /**
     * Edit method
     *
     * @param string|null $id Video id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $video = $this->Videos->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $video = $this->Videos->patchEntity($video, $this->request->getData());
            if ($this->Videos->save($video)) {
                $this->Flash->success(__('The video has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The video could not be saved. Please, try again.'));
        }
        $manuals = $this->Videos->Manuals->find('list', limit: 200)->all();
        $this->set(compact('video', 'manuals'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Video id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $video = $this->Videos->get($id);
        if ($this->Videos->delete($video)) {
            $this->Flash->success(__('The video has been deleted.'));
        } else {
            $this->Flash->error(__('The video could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function softDelete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $video = $this->Videos->get($id);
        if ($this->Videos->softDelete($id)) {
            $this->Flash->success(__('The video has been deleted.'));
        } else {
            $this->Flash->error(__('The video could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
