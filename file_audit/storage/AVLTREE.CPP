/******** AVL Tree ********/
#include<stdio.h>
#include<stdlib.h>
#include<conio.h>


typedef struct node{
	int data;
	node *left;
	node *right;
	int weight;
	int leftHeight;
	int rightHeight;
}tree_node;

// ####################### Stack Part #######################
typedef struct stack_node{
	tree_node *tnode;
	stack_node *next;
}stack;

int IsEmpty_st(stack *st)
{
	return(st==NULL);
}

void create_st(stack **st)
{
	stack *p;
	p=NULL;
	*st=p;
}

void push(tree_node *push_v,stack **st)
{
	stack *p,*tp;

	p=new stack;
	p->tnode=push_v;

	tp=*st;
	if(IsEmpty_st(tp))
	{
		p->next=NULL;
	}else
	{
		p->next=tp;
	}
	*st=p;
}

void pop(tree_node **pop_v,stack **st)
{
	stack *p;

	p=*st;

	if(!IsEmpty_st(p))
	{
		*pop_v=p->tnode;
		*st=p->next;
		delete p;
	}
}

void clear_st(stack **st)
{
	stack *p;
	tree_node *tr;
	p=*st;
	while(p!=NULL)
	{
		pop(&tr,&p);
	}
	*st=p;
}

// ####################### End of Stack Part #######################

int max(int value1, int value2)
{
	if(value1>value2)
		return(value1);
	else
		return(value2);
}

int IsEmpty(tree_node *tree)
{
	return(tree==NULL);
}

void create_tree(tree_node **newtree)
{
	tree_node *p;
	p=NULL;
	*newtree=p;
}

void inorder(tree_node *tree)
{
	if(tree!=NULL)
	{
		inorder(tree->left);
		printf(" %d",tree->data);
		inorder(tree->right);
	}
}

void resv_inorder(tree_node *tree)
{
	if(tree!=NULL)
	{
		resv_inorder(tree->right);
		printf(" %d",tree->data);
		resv_inorder(tree->left);
	}
}


tree_node *NewNode(int value)
{
	tree_node *p;

	p=new tree_node;
	p->data=value;
	p->leftHeight=0;
	p->rightHeight=0;
	p->weight=0;
	p->left=NULL;
	p->right=NULL;
	return(p);
}

//#####################    Update Height  #######
void updateHeight(tree_node **tp)
{
	tree_node *pleft,*pright;
	pleft=(*tp)->left;
	pright=(*tp)->right;

	if(pleft!=NULL)
		(*tp)->leftHeight=max(pleft->leftHeight,pleft->rightHeight)+1;
	else
		(*tp)->leftHeight=0;

	if(pright!=NULL)
		(*tp)->rightHeight=max(pright->leftHeight,pright->rightHeight)+1;
	else
		(*tp)->rightHeight=0;

	(*tp)->weight=(*tp)->leftHeight - (*tp)->rightHeight;
}
//##################### End of Update Height ###

void singleRightRotation(tree_node **tp,tree_node *p)
{
	(*tp)->left=p->right;
	p->right=*tp;
	updateHeight(tp);
	updateHeight(&p);
	*tp=p;
}

void doubleRightRotation(tree_node **tp,tree_node *p)
{
	tree_node *q;

	q=p->right;
	p->right=q->left;
	(*tp)->left=q->right;
	q->right=*tp;
	q->left=p;
	updateHeight(tp);
	updateHeight(&p);
	updateHeight(&q);
	*tp=q;
}

void singleLeftRotation(tree_node **tp,tree_node *p)
{
	(*tp)->right=p->left;
	p->left=*tp;
	updateHeight(tp);
	updateHeight(&p);
	*tp=p;
}

void doubleLeftRotation(tree_node **tp,tree_node *p)
{
	tree_node *q;

	q=p->left;
	p->left = q->right;
	(*tp)->right=q->left;
	q->left=*tp;
	q->right=p;
	updateHeight(tp);
	updateHeight(&p);
	updateHeight(&q);
	*tp=q;
}

void updatePrevNode(stack **st,tree_node *tp,tree_node **tree)
{
	tree_node *p;

	if(!IsEmpty_st(*st))
	{
		pop(&p,st);
		if(tp->data<p->data)
			p->left=tp;
		else
			p->right=tp;
		push(p,st);
	}else
		*tree=tp;
}


void adjustHeight(tree_node **tp,tree_node *p,tree_node **tree,stack **st)
{
	updateHeight(tp);
	if(abs((*tp)->weight)>1)
	{
		if((*tp)->weight>0)
			if(p->weight>0)
				singleRightRotation(tp,p);
			else
				doubleRightRotation(tp,p);
		else
			if(p->weight<0)
				singleLeftRotation(tp,p);
			else
				doubleLeftRotation(tp,p);
		updatePrevNode(st,*tp,tree);
	}
}

void Insert_AVL(int ins_value,tree_node **tree)
{
	tree_node *tp,*p;
	stack *st;
	int exist_v=0;
	create_st(&st);
	if(IsEmpty(*tree))
		*tree=NewNode(ins_value);
	else
	{
		p=NewNode(ins_value);
		tp=*tree;
		while(tp!=NULL)
		{
			push(tp,&st);
			if(p->data < tp->data)
				tp=tp->left;
			else if(p->data > tp->data)
				tp=tp->right;
			else
			{
				exist_v=1;
				clear_st(&st);
				tp=NULL;
			}
		}
		if(!exist_v)
		{
			pop(&tp,&st);
			if(p->data < tp->data)
				tp->left = p;
			else
				tp->right = p;

			updateHeight(&tp);
			p=tp;
			while(!IsEmpty_st(st))
			{
				pop(&tp,&st);
				adjustHeight(&tp,p,tree,&st);
				p=tp;
			}
		}
		else
		{
			printf("\n!! Cannot insert exist value : %d",ins_value);
		}
	}
}

void main(void)
{
	tree_node *root;
	create_tree(&root);
	clrscr();

	printf("\nInsert 4, 5, 3, 2, 1 to AVL");

	Insert_AVL(4,&root);
	Insert_AVL(5,&root);
	Insert_AVL(3,&root);
	Insert_AVL(2,&root);
	Insert_AVL(1,&root);

	printf("\n Reverse Inorder :");
	resv_inorder(root);

	printf("\nInsert 5, 6 to AVL");

	Insert_AVL(5,&root);
	Insert_AVL(6,&root);


	printf("\n Inorder :");
	inorder(root);
	getch();
}