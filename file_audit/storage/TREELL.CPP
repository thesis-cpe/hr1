/******** Linked List Tree ********/
#include<stdio.h>
#include<conio.h>

typedef struct node{
	int data;
	node *left;
	node *right;
}tree_node;

typedef struct{
	tree_node *root;
	int count;
}tree;

// ******************************************************************

//                  Stack for tree traverse

// ******************************************************************

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

// ******************************************************************

// 			End stack part

// ******************************************************************

int IsEmpty(tree *t)
{
	return(t->root==NULL);
}

void create_tree(tree **newtree)
{
	*newtree=new tree;
	(*newtree)->root=NULL;
	(*newtree)->count=0;
}

void Insert_BST(int ins_v,tree *t)
{
	tree_node *p,*prev,*tp;
	//int h;

	p=new tree_node;
	p->data=ins_v;
	p->left=NULL;
	p->right=NULL;

	if(IsEmpty(t))
	{
		t->root=p;
		t->count=1;
	}else
	{
		tp=t->root;

		while(tp!=NULL)
		{
			prev=tp;

			if(p->data==tp->data) // Insert Exists Value
			{
				printf("\nValue %d Already Exists",p->data);
				tp=NULL;
			}else if(p->data>tp->data) // More value go Right
			{
				tp=tp->right;
			}else // Less value go Left
			{
				tp=tp->left;
			}
		}

		if(p->data>prev->data) //Insert More value right
		{	prev->right=p;
			t->count++;
		}else if(p->data<prev->data) //Insert Less value left
		{	prev->left=p;
			t->count++;
		}
	}
}

void Delete_BST(int del_v,tree *t)
{
	tree_node *p,*prev,*tp;
	int tmp;
	if(IsEmpty(t))
	{
		printf("\nEmpty Tree");
	}else
	{	p=t->root;
		while((p->data!=del_v)&&(p!=NULL))
		{	prev=p;
			if(p->data<del_v) p=p->right;
			else p=p->left;
		}
		if(p==NULL)
		{
			printf("\nNot found %d in tree.",del_v);
		}else
		{
			if((p->left==NULL)&&(p->right==NULL)) //leaf node
			{
				if(p==t->root)
					t->root=NULL;
				else
				{
					if(prev->data>del_v) prev->left=NULL;
					else prev->right=NULL;
				}
				delete p;
				t->count--;
			}else if((p->left==NULL)||(p->right==NULL)) // single child node
			{
				if(p==t->root)
				{
					if(p->right==NULL) t->root=p->left;
					else t->root=p->right;
				}else
				{
					if(prev->data>del_v)
						if(p->right==NULL) prev->left=p->left;
						else prev->left=p->right;
					else
						if(p->right==NULL) prev->right=p->left;
						else prev->right=p->right;
				}
				delete p;
				t->count--;
			}else //two children node
			{
				tp=p->left;
				while(tp->right!=NULL);
				{	tp=tp->right; }
				tmp=tp->data;
				Delete_BST(tmp,t);
				t->count--;
				p->data=tmp;
			}
		}
	}
}

void inorder(tree_node *tree)
{
	stack *st;
	tree_node *p;
	create_st(&st);

	p=tree;
	do
	{
		while(p!=NULL)
		{
			push(p,&st);
			p=p->left;
		}
		if(!IsEmpty_st(st))
		{
			pop(&p,&st);
			printf(" %d",p->data);
			p=p->right;
		}
	}while((p!=NULL)||(!IsEmpty_st(st)));

}

void preorder(tree_node *tree)
{
	stack *st;
	tree_node *p;
	create_st(&st);

	p=tree;
	do
	{
		while(p!=NULL)
		{
			printf(" %d",p->data);
			push(p,&st);
			p=p->left;
		}
		if(!IsEmpty_st(st))
		{
			pop(&p,&st);
			//printf(" %d",p->data);
			p=p->right;
		}
	}while((p!=NULL)||(!IsEmpty_st(st)));
}

void inorderre(tree_node *tree)
{
	if(tree!=NULL)
	{
		inorderre(tree->left);
		printf(" %d",tree->data);
		inorderre(tree->right);
	}
}

void reinorder(tree_node *tree)
{
	if(tree!=NULL)
	{
		reinorder(tree->right);
		printf(" %d",tree->data);
		reinorder(tree->left);
	}
}

void postorderre(tree_node *tree)
{
	//Postorder code
}


void main(void)
{
	tree *b;
	create_tree(&b);
	clrscr();

	printf("\nInsert 2, 8, 5, 4, 7, 9, 3, 1 to BST");

	Insert_BST(2,b);
	Insert_BST(8,b);
	Insert_BST(5,b);
	Insert_BST(4,b);
	Insert_BST(7,b);
	Insert_BST(9,b);
	Insert_BST(3,b);
	Insert_BST(1,b);

	printf("\nDelete 4, 1, 6 from BST");

	Delete_BST(4,b);
	Delete_BST(1,b);
	Delete_BST(6,b);

	printf("\nTraverse Inorder :");
	inorder(b->root);

	printf("\nTraverse Reverse Inorder :");
	reinorder(b->root);


	printf("\nInsert 6, 9, 11, 8, 1 to BST");

	Insert_BST(6,b);
	Insert_BST(9,b);
	Insert_BST(11,b);
	Insert_BST(8,b);
	Insert_BST(1,b);

	printf("\nTraverse Inorder :");
	inorder(b->root);

	printf("\nTraverse Preorder :");
	preorder(b->root);

	printf("\nTraverse Inorder recursive :");
	inorderre(b->root);

	//printf("\nTraverse Postorder recursive :");
	//postorderre(b->root);
	getch();

}



