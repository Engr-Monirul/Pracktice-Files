#include <iostream>
using namespace std;

#define size 50
int listSize=0;
struct list
{
    int list[size];
    int top;
};
typedef struct list list;

void createEmpty(list* s)
{
    s->top=-1;
}

int isEmpty(list* s)
{
    if(s->top<0)
        return 1;
    else
        return 0;
}

int isFull(list *s)
{
    if(s->top == size-1)
        return 1;
    else
        return 0;
}

void push(list *s, int data)
{
    if(s->top<0)
    {
        s->top++;
        s->list[s->top]=data;
        listSize++;
    }
    else if(s->top==size-1)
    {
        cout<<"List Is Full"<<endl;
    }
    else
    {
        s->top++;
        s->list[s->top]=data;
        listSize++;
    }
}

void pop(list* s)
{
    if(s->top<0)
    {
        cout<<"List Already Empty!"<<endl;
    }
    else
    {
        s->top--;
    }
    listSize--;
}

void disp(list* s)
{
    if(s->top<0)
    {
        cout<<"List Is Empty"<<endl;
    }
    else
    {
        for(int i=listSize-1; i>=0; i--)
            cout<<s->list[i]<<endl;
    }
}

int main()
{
    list* s=(list*)malloc(sizeof(list));

    int action=0,data,check;
    while(true)
    {
        cout<<"\n\n1.Create Empty\n2.Check Is It Full\n3.Check Is It Empty\n4.Push Data\n5.Pop Data\n6.Display\nInput: ";
        cin>>action;
        cout<<endl;
        if(action==1 || action==2 || action==3 || action==4 || action==5 || action==6)
        {
            switch(action)
            {
                case 1:
                    createEmpty(s);
                    break;
                case 2:
                    check=isFull(s);
                    if(check==0) cout<<"List Is Not Full"<<endl;
                    else cout<<"List Is Full"<<endl;
                    break;
                case 3:
                    check=isEmpty(s);
                    if(check==0) cout<<"List Is Not Empty"<<endl;
                    else cout<<"List Is Empty"<<endl;
                    break;
                case 4:
                    cin>>data;
                    push(s, data);
                    break;
                case 5:
                    pop(s);
                    break;
                case 6:
                    disp(s);
                    break;
            }
        }
        action=0;
    }
}