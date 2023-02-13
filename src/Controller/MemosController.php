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

        //editの場合
        $session = $this->getRequest()->getSession();
        $memo = $session->read('memo'.$params['count']);
        // dd($memo);
        
        if ($this->request->getData('memo')) {//登録時の処理
            
            $session = $this->getRequest()->getSession();
            $session->write('memo'.$params['count'], $this->request->getData('message'));
            
            ++$params['count'];
            $params['title'] = 'メモ'.$params['count'].'ページ';
            
            if( $params['count'] >= 4 ){
                return $this->redirect(['action' => 'show', $params['user_id'], '?' => ['count' => $params['count']]]);
            }
        }
        
        $this->set(compact('params', 'memo'));
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
        $sessionParams = $session->read();
        // dd($sessionParams);
        $this->set('memos', $sessionParams);

        $count = $this->request->getQuery('count');

        $params['user_id'] = $id;
        // dd($this->request->getData());
        if ($this->request->is('post')) {
            for ($i = 1; $i <= 5; $i++) {//適当に５にしてある
                if( !empty($sessionParams['memo'.$i]) ){
                    $registParams['message'] = $sessionParams['memo'.$i];
                    $registParams['memo_id'] = $i;
                    $registParams['user_id'] = $id;
                    
                    $tblMemos = $this->Memos;
                    $entMemo =  $tblMemos->newEntity($registParams, ['validate' => false]);
                    
                    try{
                        $tblMemos->save($entMemo,false);
                        $session->delete('memo'.$i);
                        
                    }catch( \Exception $e ){
                        // $this->Flash->error( \App\Lib\Messages::get(3) );
                        
                        debug($entMemo->getErrors());
                        
                    }
                    // dd('おわり');
                    // return $this->redirect(['controller' => 'Memos', 'action' => 'show2', $params['user_id']]);
                }
            }
        }

        $this->set(compact('params', 'count'));
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
        $params['count'] = $this->request->getQuery('count');
        $params['title'] = 'メモ'.$params['count'].'ページ';

        $session = $this->getRequest()->getSession();
        $sessionParams = $session->read();
        // dd($sessionParams);
        $this->set('memos', $sessionParams);
        
        if ($this->request->getData('message')) { //登録時の処理
            
            $session = $this->getRequest()->getSession();
            $session->write('memo'.$params['count'], $this->request->getData('message'));
            
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
