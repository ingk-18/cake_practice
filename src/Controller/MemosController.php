<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Memos Controller
 *
 * @property \App\Model\Table\MemosTable $Memos
 * @method \App\Model\Entity\Memo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MemosController extends AppController
{
    /**
     * Index method
     * メモ4ページ（count = 4）になるとshowへ行く
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index($id = null)
    {
        $params['user_id'] = $id;
        $params['count'] = $this->request->getQuery('count') ?? 1;
        $params['title'] = 'メモ'.$params['count'].'ページ';
        
        if ($this->request->getData('message')) {
            
            $session = $this->getRequest()->getSession();
            $session->write('test'.$params['count'], $this->request->getData('message'));
            
            ++$params['count'];
            $params['title'] = 'メモ'.$params['count'].'ページ';
            
            if( $params['count'] >= 4 ){
                return $this->redirect(['action' => 'show', $params['user_id'], '?' => ['count' => $params['count']]]);
            }
        }
        
        $this->set(compact('params'));
    }
    
    
    /**
     * View method
     *
     * @param string|null $id Memo id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function show($id = null)
    {
        $session = $this->getRequest()->getSession();
        // dd($session->read('test1'));
        $this->set('memos', $session->read());

        $count = $this->request->getQuery('count');

        $params['user_id'] = $id;
        
        if ($this->request->getData('???????')) {
            $params['message'] = $this->request->getData('message');
            $params['memo_id'] = '1';
            

            $tblMemos = $this->Memos;

            $entMemo =  $tblMemos->newEntity($params, ['validate' => false]);

            if($tblMemos->save($entMemo,false)){
                return $this->redirect(['controller' => 'Memos', 'action' => 'show2', $params['user_id']]);
            }else{
                debug($entMemo->getErrors());
            }
        }

        $this->set(compact('params', 'count'));
    }

    /**
     * View method
     *
     * @param string|null $id Memo id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function confirm($id = null)
    {
        $memo = $this->Memos->find('DefaultMemos')
            ->where([
                'Users.id' => $id
            ]);

        $this->set(compact('memo'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $memo = $this->Memos->newEmptyEntity();
        if ($this->request->is('post')) {
            $memo = $this->Memos->patchEntity($memo, $this->request->getData());
            if ($this->Memos->save($memo)) {
                $this->Flash->success(__('The memo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The memo could not be saved. Please, try again.'));
        }
        $users = $this->Memos->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('memo', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Memo id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $memo = $this->Memos->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $memo = $this->Memos->patchEntity($memo, $this->request->getData());
            if ($this->Memos->save($memo)) {
                $this->Flash->success(__('The memo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The memo could not be saved. Please, try again.'));
        }
        $users = $this->Memos->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('memo', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Memo id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $memo = $this->Memos->get($id);
        if ($this->Memos->delete($memo)) {
            $this->Flash->success(__('The memo has been deleted.'));
        } else {
            $this->Flash->error(__('The memo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
